<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttachmentsTable extends Migration {

  public function up() {
    Schema::create('attachments', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->unsignedBigInteger('consultation_id');
      $table->foreign('consultation_id')->references('id')->on('consultations');

      $table->string('url');
      $table->date('date');

      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('attachments');
  }
}
