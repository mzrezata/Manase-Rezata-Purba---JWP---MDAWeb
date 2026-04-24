<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class UpdateUsersRoleEnum extends Migration
{
    public function up()
    {
        // Ubah enum role untuk include 'visitor'
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('visitor', 'admin', 'hr', 'superadmin') DEFAULT 'visitor'");
    }

    public function down()
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin', 'hr', 'superadmin') DEFAULT 'hr'");
    }
}