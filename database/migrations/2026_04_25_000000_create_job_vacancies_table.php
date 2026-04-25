<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobVacanciesTable extends Migration
{
    public function up()
    {
        Schema::create('job_vacancies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');                          
            $table->string('location')->default('Surakarta, Jawa Tengah');
            $table->enum('job_type', ['Full-time', 'Part-time', 'Contract', 'Freelance'])->default('Full-time');
            $table->enum('work_type', ['On-site', 'Hybrid', 'Remote'])->default('On-site');
            $table->string('color_gradient')->default('from-blue-600 to-blue-800'); // Warna card
            $table->text('description');                      
            $table->text('qualifications');                   
            $table->boolean('is_active')->default(true);      
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_vacancies');
    }
}