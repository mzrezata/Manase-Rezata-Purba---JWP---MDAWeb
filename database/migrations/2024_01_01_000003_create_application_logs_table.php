<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationLogsTable extends Migration
{
    public function up()
    {
        Schema::create('application_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('application_type');
            $table->unsignedBigInteger('application_id');
            $table->string('action');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            
            $table->index(['application_type', 'application_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_logs');
    }
}