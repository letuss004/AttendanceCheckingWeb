<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseStudentPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id');
            $table->timestamps();
        });
        $values = [
            [
                'course_id' => 1,
                'student_id' => 'BA9067',
            ], [
                'course_id' => 2,
                'student_id' => 'BA9067',
            ], [
                'course_id' => 3,
                'student_id' => 'BA9067',
            ], [
                'course_id' => 1,
                'student_id' => 'BA9044',
            ], [
                'course_id' => 2,
                'student_id' => 'BA9044',
            ]
        ];
        DB::table('course_student')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_student');
    }
}
