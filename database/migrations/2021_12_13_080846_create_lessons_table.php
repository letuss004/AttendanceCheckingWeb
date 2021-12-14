<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('teacher_id')->index();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('teacher_id')->references('id')->on('teachers');

        });

        $values = [
            ['course_id' => 1,
                'teacher_id' => 1],
            ['course_id' => 2,
                'teacher_id' => 1],
            ['course_id' => 3,
                'teacher_id' => 1],
        ];
        DB::table('lessons')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
