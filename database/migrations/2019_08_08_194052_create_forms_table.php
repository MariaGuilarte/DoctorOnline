<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration {

  public function up() {
    Schema::create('forms', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('consultation_id');
      $table->foreign('consultation_id')->references('id')->on('consultations');

      $table->string('type');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('forms');
  }
}
