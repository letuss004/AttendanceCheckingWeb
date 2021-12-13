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
            $table->string('id')->unique();
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->integer('user_type_id');
            $table->string('name');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->index('id');
            $table->index('user_type_id');
            $table->primary('id');
        });

        $values = [
            [
                'id' => 'ADM001',
                'email' => 'letuss004@gmail.com',
                'username' => 'LAT admin',
                'user_type_id' => 3,
                'name' => 'Le Anh Tu',
                'password' => Hash::make('letuss004')],
            [
                'id' => 'ICT067',
                'email' => 'tula.ba9067@st.usth.edu.vn',
                'username' => 'LAT teacher',
                'user_type_id' => 2,
                'name' => 'Le Anh Tu',
                'password' => Hash::make('letuss004')],
            [
                'id' => 'BA9067',
                'email' => 'tula.ba9067@usth.edu.vn',
                'username' => 'BA9067 Le Anh Tu',
                'user_type_id' => 1,
                'name' => 'Le Anh Tu',
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
