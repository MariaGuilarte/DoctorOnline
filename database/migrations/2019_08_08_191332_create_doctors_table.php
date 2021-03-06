<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
	public function up() {
		Schema::create('doctors', function (Blueprint $table) {
			$table->bigIncrements('id');

			$table->unsignedBigInteger('user_id');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			
			$table->string('speciality');
			$table->timestamps();
		});
	}

	public function down() {
		Schema::dropIfExists('doctors');
	}
}
