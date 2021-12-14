<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->index();
            $table->unsignedBigInteger('department_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });

        $values = [
            ['user_id' => 'ICT067',
                'department_id' => 1],
        ];
        DB::table('teachers')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
