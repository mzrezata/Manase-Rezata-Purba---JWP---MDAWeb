<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternshipApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('internship_applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // A. Informasi Pribadi
            $table->string('full_name');
            $table->string('birth_place');
            $table->date('birth_date');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->text('address');
            $table->string('phone');
            $table->string('email');
            $table->string('photo')->nullable();
            
            // B. Latar Belakang Pendidikan
            $table->string('institution_name');
            $table->string('major');
            $table->integer('current_semester');
            $table->decimal('gpa', 3, 2);
            $table->integer('entry_year');
            $table->integer('graduation_year');
            $table->string('recommendation_letter');
            
            // C. Informasi Magang
            $table->string('desired_position');
            $table->text('internship_purpose');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('is_mandatory', ['Ya', 'Tidak']);
            $table->enum('availability', ['Full-time', 'Part-time', 'Hybrid']);
            
            // D. Keahlian & Portofolio
            $table->text('skills');
            
            // Status & Tracking
            $table->enum('status', ['pending', 'reviewed', 'accepted', 'rejected'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->unsignedBigInteger('reviewed_by')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            // Indexes
            $table->index('email');
            $table->index('status');
            $table->index('desired_position');
        });
    }

    public function down()
    {
        Schema::dropIfExists('internship_applications');
    }
}