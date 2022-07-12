<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_cars', function (Blueprint $table) {
            $table->id();
            $table->integer('car_id');
            $table->date('technical_inspection_expire');
            $table->date('register_expire');
            $table->date('yellowbook_expire');
            $table->integer('driver_id')->nullable();
            $table->date('insurance_exp');
            $table->date('tax_road_date');
            $table->string('remark',100)->nullable();
            $table->integer('updated_by');
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
        Schema::dropIfExists('document_cars');
    }
}
