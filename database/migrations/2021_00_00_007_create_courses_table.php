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
            $table->string('admin_id');
            $table->string('teacher_id');
            $table->boolean('active');
            $table->timestamps();
            $table->foreign('course_list_id')->references('id')->on('course_lists');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('teacher_id')->references('id')->on('teachers');

        });

        $values = [
            [
                'course_list_id' => 1,
                'teacher_id' => 'ICT067',
                'active' => true,
                'admin_id' => 'ADM001'
            ], [
                'course_list_id' => 4,
                'teacher_id' => 'ICT067',
                'active' => true,
                'admin_id' => 'ADM001'
            ], [
                'course_list_id' => 6,
                'teacher_id' => 'ICT067',
                'active' => true,
                'admin_id' => 'ADM001'
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
