<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaintenancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->integer('odo_meter');
            $table->integer('report_by');
            $table->date('maintenance_date');
            $table->integer('maintenance_type');
            $table->integer('odo_meter_at');
            $table->string('maintenance_item',150);
            $table->integer('cost');
            $table->integer('status');
            $table->string('remark',50)->nullable();
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
        Schema::dropIfExists('maintenances');
    }
}
