<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->unique()->nullable()->after('name');
            $table->text('about')->nullable()->after('username');
            $table->string('photo')->nullable()->after('about');
            $table->string('no_hp')->nullable()->after('email');
            $table->string('alamat')->nullable()->after('no_hp');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['username', 'about', 'photo', 'no_hp', 'alamat']);
        });
    }
};
