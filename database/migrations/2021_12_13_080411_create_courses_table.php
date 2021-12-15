<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Illuminate\Support\Facades\DB;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_list_id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
        });

        $values = [
            [
                'course_list_id' => 1,
                'teacher_id' => 1,
                'student_id' => 1,
                'admin_id' => 1
            ], [
                'course_list_id' => 4,
                'teacher_id' => 1,
                'student_id' => 1,
                'admin_id' => 1
            ], [
                'course_list_id' => 6,
                'teacher_id' => 1,
                'student_id' => 1,
                'admin_id' => 1
            ]
        ];
        DB::table('courses')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
