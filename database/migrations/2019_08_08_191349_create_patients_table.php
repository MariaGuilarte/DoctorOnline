<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {
  public function up() {
    Schema::create('patients', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('user_id');
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      
      $table->date('birthdate');
      $table->double('weight');
      $table->double('height');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('patients');
  }
}
