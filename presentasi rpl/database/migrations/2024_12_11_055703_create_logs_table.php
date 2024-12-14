<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id'); 
            $table->string('action'); // CRUD action
            $table->string('description'); // Detail aktivitas
            $table->string('entity'); // Nama entitas (Karyawan, Perusahaan, dll.)
            $table->unsignedBigInteger('user_id')->nullable(); // ID pengguna yang melakukan
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
