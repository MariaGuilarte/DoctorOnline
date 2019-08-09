<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConsultationsTable extends Migration
{
    public function up()
    {
      Schema::create('consultations', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('doctor_id');
        $table->foreign('doctor_id')->references('id')->on('doctors');

        $table->unsignedBigInteger('patient_id');
        $table->foreign('patient_id')->references('id')->on('patients');

        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id')->on('products');

        $table->unsignedBigInteger('reviser_id');
        $table->foreign('reviser_id')->references('id')->on('revisers');

        $table->string('condition');
        $table->date('date');
        $table->timestamps();
      });
    }

    public function down()
    {
      Schema::dropIfExists('consultations');
    }
}
