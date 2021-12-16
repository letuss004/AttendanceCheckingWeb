<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->unsignedBigInteger('user_type_id');
            $table->string('name');
            $table->string('password');
            $table->unsignedBigInteger('department_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $values = [
            [
                'id' => 'ADM001',
                'email' => 'letuss004@gmail.com',
                'username' => 'LAT admin',
                'user_type_id' => 3,
                'name' => 'Le Anh Tu',
                'department_id' => 1,
                'password' => Hash::make('letuss004')],
            [
                'id' => 'ICT067',
                'email' => 'tula.ba9067@usth.edu.vn',
                'username' => 'LAT teacher',
                'user_type_id' => 2,
                'department_id' => 1,
                'name' => 'Le Anh Tu',
                'password' => Hash::make('tula.ba9067')],
            [
                'id' => 'BA9067',
                'email' => 'tula.ba9067@st.usth.edu.vn',
                'username' => 'BA9067 Le Anh Tu',
                'user_type_id' => 1,
                'department_id' => 1,
                'name' => 'Le Anh Tu',
                'password' => Hash::make('tula.ba9067')],
            [
                'id' => 'BA9044',
                'email' => 'test.ba9044@st.usth.edu.vn',
                'username' => 'Test 044',
                'user_type_id' => 1,
                'department_id' => 3,
                'name' => 'Nguyen Ngoc Khiem',
                'password' => Hash::make('letuss004')],
        ];
        DB::table('users')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
