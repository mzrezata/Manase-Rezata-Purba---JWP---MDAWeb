<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // A. Informasi Pribadi
            $table->string('full_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->enum('marital_status', ['Belum Menikah', 'Menikah', 'Cerai']);
            $table->string('photo');
            
            // B. Pendidikan & Pengalaman
            $table->string('last_education');
            $table->string('institution_name');
            $table->string('major');
            $table->integer('graduation_year');
            $table->text('work_experience')->nullable();
            $table->text('certifications')->nullable();
            
            // C. Informasi Lamaran
            $table->string('applied_position');
            $table->decimal('expected_salary', 12, 2)->nullable();
            $table->date('available_from');
            $table->text('reason_to_apply');
            $table->enum('willing_to_relocate', ['Ya', 'Tidak']);
            
            // D. Keahlian & Portofolio
            $table->text('technical_skills');
            $table->text('soft_skills');
            $table->string('portfolio_link')->nullable();
            $table->string('cv_file');
            $table->string('cover_letter_file');
            
            // Status & Tracking
            $table->enum('status', ['pending', 'reviewed', 'interview', 'accepted', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('email');
            $table->index('status');
            $table->index('applied_position');
        });
    }

    public function down()
    {
        Schema::dropIfExists('job_applications');
    }
}