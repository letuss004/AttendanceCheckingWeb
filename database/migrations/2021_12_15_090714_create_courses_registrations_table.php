<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_registrations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->string('student_id')->index();
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
        });
        $values = [
            [
                'course_id' => 1,
                'student_id' => 1,
            ], [
                'course_id' => 2,
                'student_id' => 1,
            ], [
                'course_id' => 3,
                'student_id' => 1,
            ],
        ];
        DB::table('courses_registrations')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_registrations');
    }
}
