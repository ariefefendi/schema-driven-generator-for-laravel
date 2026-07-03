<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('osm_id')->nullable()->index();

            $table->string('name',255)->index();

            $table->double('latitude', 10,7);

            $table->double('longitude', 10,7);

            $table->string('type',50)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};