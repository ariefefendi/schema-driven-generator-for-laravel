<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('edges', function (Blueprint $table) {
            $table->id();
            $table->string('from_node_id');
            $table->string('to_node_id');
            $table->string('distance');
            $table->string('geometry');
            // $table->string('created_at')->nullable();
            // $table->string('updated_at')->nullable();

            $table->timestamps();

            $table->index(['from_node_id']);
            $table->index(['to_node_id']);
            $table->unique(['from_node_id','to_node_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('edges');
    }
};
