<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('calculation_logs', function (Blueprint $table) {
            $table->id();
            $table->string('start_node_id');
            $table->string('end_node_id');
            $table->string('total_distance');
            $table->string('execution_time');
            $table->string('total_nodes_processed')->nullable();
            $table->string('created_at')->nullable();
            $table->string('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calculation_logs');
    }
};
