<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MakeCrudCommand extends Command
{
    protected $signature = 'make:crud {module} {--schema=}';
    protected $description = 'Generate full CRUD (API + DT + KO ready) based on JSON schema. version : 2.0';

    protected string $module;
    protected string $modelName;
    protected string $routeName;

    protected function initNames(): void
    {
        $this->module    = strtolower($this->argument('module'));
        $this->modelName = Str::studly($this->module);
        $this->routeName = Str::kebab($this->module);
    }

    public function handle()
    {
        $this->initNames();

        $schemaPath = $this->option('schema')
            ?? base_path("schemas/{$this->module}.json");

        if (!File::exists($schemaPath)) {
            $this->error("Schema not found: {$schemaPath}");
            return Command::FAILURE;
        }

        $schema = json_decode(File::get($schemaPath), true);
        if (!$schema) {
            $this->error("Invalid JSON schema");
            return Command::FAILURE;
        }

        $this->info("Generating CRUD: {$this->module}");

        $this->generateModel($schema);
        $migrationFile = $this->generateMigration($schema);
        $this->generateController($schema);
        $this->generateRoute();
        $this->generateView($schema);

        // AUTO MIGRATE 
        $this->runMigration($migrationFile, $schema['table']);

        $this->info("✅  CRUD generation completed. version: 2.0");
        return Command::SUCCESS;
    }

    /* =====================================================
     | MODEL
     ===================================================== */
    protected function generateModel(array $schema)
    {
        $fillable = collect($schema['fields'])
            ->pluck('name')
            ->map(fn ($f) => "        '{$f}',")
            ->implode("\n");
    
        $softDeleteImport = $schema['soft_delete']
            ? "use Illuminate\\Database\\Eloquent\\SoftDeletes;"
            : "";
    
        $softDeleteTrait = $schema['soft_delete']
            ? "use SoftDeletes;"
            : "";
    
        $this->generateFromStub(
            'model.stub',
            app_path("Models/{$this->modelName}.php"),
            [
                'ModelName'        => $this->modelName,
                'table'            => $schema['table'],
                'primaryKey'       => $schema['primary_key'] ?? 'id',
                'fillable'         => $fillable,
                'softDeleteImport' => $softDeleteImport,
                'softDeleteTrait'  => $softDeleteTrait,
            ]
        );
    
        $this->info("Model created");
    }

    /* =====================================================
     | CONTROLLER
     ===================================================== */
    protected function generateController(array $schema)
    {
        $allowedFilter = collect($schema['fields'])
            ->pluck('name')
            ->map(fn ($f) => "'{$f}'")
            ->implode(', ');

        $rules = $this->buildValidationRules($schema);

        $this->generateFromStub(
            'controller.stub',
            app_path("Http/Controllers/Api/{$this->modelName}Controller.php"),
            [
                'ControllerName' => "{$this->modelName}Controller",
                'ModelName'      => $this->modelName,
                'allowedFilter'  => "[{$allowedFilter}]",
                'validationRules'=> "[{$rules}]",
                'primaryKey'     => $schema['primary_key'] ?? 'id',
            ]
        );

        $this->info("Controller created");
    }

    /* =====================================================
     | MIGRATION
     ===================================================== */
    protected function generateMigration(array $schema): string
    {
        $filename = date('Y_m_d_His') . "_create_{$schema['table']}_table.php";
        $path = database_path("migrations/{$filename}");

        $this->generateFromStub(
            'migration.stub',
            $path,
            [
                'TableName'  => $schema['table'],
                'Columns'    => $this->buildMigrationColumns($schema),
                'SoftDelete' => $schema['soft_delete']
                    ? '            $table->softDeletes();'
                    : '',
                'Timestamps' => $schema['timestamps']
                    ? '            $table->timestamps();'
                    : '',
            ]
        );

        $this->info("Migration created");
        return $filename;
    }

    protected function runMigration(string $filename, string $tableName)
    {
        if (Schema::hasTable($tableName)) {
            $this->warn("Table '{$tableName}' already exists. Migration skipped.");
            return;
        }
    
        $this->info("Running migration...");
        Artisan::call('migrate', [
            '--path'  => "database/migrations/{$filename}",
            '--force' => true,
        ]);
    
        $this->line(Artisan::output());
    }
    
    /* =====================================================
     | Blade View + KnockoutJS
     ===================================================== */
    protected function generateView(array $schema)
    {
        $fields = collect($schema['fields']);
    
        $modelVar = strtolower($this->modelName);
    
        $modelFieldsJs = $fields->map(fn($f) => "{$f['name']}: \"\",")->implode("\n        ");
    
        $selectFilterOptions = $fields
            ->map(fn($f) => "{ name: \"{$f['name']}\", value: \"{$f['name']}\" },")
            ->implode("\n                ");
    
        $filterableFields = $fields
            ->pluck('name')
            ->map(fn($f) => "\"{$f}\"")
            ->implode(', ');
    
        $formFieldsHtml = $fields->map(function($f){
            return <<<HTML
    <div class="col-md-6">
        <div class="form-group">
            <label>{$f['name']}</label>
            <input type="text" class="form-control" data-bind="value: {$f['name']}">
        </div>
    </div>
    HTML;
        })->implode("\n");
    
        $tableHeaders = $fields->map(fn($f) => "<th>{$f['name']}</th>")->implode("\n");
    
        $tableColumns = $fields->map(fn($f) => "{ data: \"{$f['name']}\" },")->implode("\n                ");
    
        $this->generateFromStub(
            'view.stub',
            resource_path("views/{$this->modelName}View.blade.php"),
            [
                'MODEL_NAME'          => $this->modelName,
                'MODEL_VAR'           => $modelVar,
                'MODEL_FIELDS_JS'     => $modelFieldsJs,
                'SELECT_FILTER_OPTIONS'=> $selectFilterOptions,
                'FILTERABLE_FIELDS'   => "[{$filterableFields}]",
                'DEFAULT_FILTER'      => $schema['fields'][0]['name'] ?? 'id',
                'FORM_FIELDS_HTML'    => $formFieldsHtml,
                'TABLE_HEADERS'       => $tableHeaders,
                'TABLE_COLUMNS'       => $tableColumns,
                'PRIMARY_KEY'         => $schema['primary_key'] ?? 'id',
                'CONTROLLER_URL'      => strtolower($this->modelName),
            ]
        );
    
        $this->info("Blade View generated: {$this->modelName}View.blade.php");
    }
    


    /* =====================================================
     | ROUTE
     ===================================================== */
    protected function generateRoute()
    {
        $dir = base_path('routes/crud');
        File::ensureDirectoryExists($dir);

        $path = "{$dir}/{$this->routeName}.php";
        if (File::exists($path)) {
            $this->warn("Route already exists");
            return;
        }

        File::put($path, <<<PHP
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\\{$this->modelName}Controller;

Route::prefix('{$this->routeName}')->group(function () {
    Route::get('/', [{$this->modelName}Controller::class, 'index']);
    Route::post('getDataAll', [{$this->modelName}Controller::class, 'getDataAll']);
    Route::get('GetDataSelect', [{$this->modelName}Controller::class, 'getDataSelect']);
    Route::post('insert', [{$this->modelName}Controller::class, 'insert']);
    Route::post('update', [{$this->modelName}Controller::class, 'update']);
    Route::delete('delete', [{$this->modelName}Controller::class, 'destroy']);
});
PHP);

        $this->info("Route created");
    }

    /* =====================================================
     | HELPERS
     ===================================================== */
    protected function generateFromStub($stub, $target, array $replace)
    {
        $content = File::get(base_path("stubs/crud/{$stub}"));

        foreach ($replace as $key => $value) {
            $content = str_replace("{{{$key}}}", $value, $content);
        }

        File::ensureDirectoryExists(dirname($target));
        File::put($target, $content);
    }

    protected function buildValidationRules(array $schema): string
    {
        return collect($schema['fields'])->map(function ($f) use ($schema) {
            $rules = [];
            $rules[] = $f['required'] ? 'required' : 'nullable';

            if (!empty($f['unique'])) {
                $rules[] = "unique:{$schema['table']}";
            }

            return "'{$f['name']}' => '" . implode('|', $rules) . "'";
        })->implode(",\n                ");
    }

    protected function buildMigrationColumns(array $schema): string
    {
        $columns = [];
    
        foreach ($schema['fields'] as $field) {
            $name = $field['name'];
            $type = $field['type'];
    
            switch ($type) {
                case 'string':
                    $length = $field['length'] ?? 255;
                    $line = "\$table->string('{$name}', {$length})";
                    break;
    
                case 'text':
                    $line = "\$table->text('{$name}')";
                    break;
    
                case 'date':
                    $line = "\$table->date('{$name}')";
                    break;
    
                case 'boolean':
                    $default = $field['default'] ?? false;
                    $line = "\$table->boolean('{$name}')->default(" . ($default ? 'true' : 'false') . ")";
                    break;
    
                default:
                    $line = "\$table->string('{$name}')";
            }
    
            if (!($field['required'] ?? false)) {
                $line .= "->nullable()";
            }
    
            if ($field['unique'] ?? false) {
                $line .= "->unique()";
            }
    
            $columns[] = "            {$line};";
        }
    
        return implode("\n", $columns);
    }
}
