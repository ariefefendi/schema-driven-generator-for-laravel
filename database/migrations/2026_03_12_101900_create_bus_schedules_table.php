<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bus_schedules', function (Blueprint $table) {
            $table->id();
                        $table->string('bus_id')->nullable();
            $table->string('driver_id');
            $table->string('start_node_id');
            $table->string('end_node_id');
            $table->string('total_distance')->nullable();
            $table->string('estimated_duration')->nullable();
            $table->string('departure_day');
            $table->string('departure_time');
            $table->string('expected_arrival_time')->nullable();
            $table->string('actual_departure_time')->nullable();
            $table->string('actual_arrival_time')->nullable();
            $table->string('status');
            $table->text('notes')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bus_schedules');
    }
};
