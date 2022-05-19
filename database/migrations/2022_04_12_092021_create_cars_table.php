<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model',50);
            $table->string('vehicle',25);
            $table->string('serial_number',125);
            $table->string('engine_number',125);
            $table->integer('power_cc');
            $table->date('date_start_usage');
            $table->integer('driver_id');
            $table->integer('division_id')->nullable();
            $table->string('condition',20);
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
