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
            $table->string('name')->nullable();
            $table->unsignedBigInteger('course_id')->index();
            $table->string('teacher_id')->index()->nullable();
            $table->timestamps(1);
            $table->foreign('course_id')->references('id')->on('courses');

        });

        $values = [
            [
                'course_id' => 1,
                'name'=>'Introduction',
                'teacher_id' => 'ICT067'],
            [
                'course_id' => 2,
                'name'=>'Introduction',
                'teacher_id' => 'ICT067'],
            [
                'course_id' => 3,
                'name'=>'Introduction',
                'teacher_id' => 'ICT067'],
            [
                'course_id' => 1,
                'name'=>'Second lecture',
                'teacher_id' => 'ICT067'],
            [
                'course_id' => 2,
                'name'=>'Second lecture',
                'teacher_id' => 'ICT067'],
            [
                'course_id' => 3,
                'name'=>'Second lecture',
                'teacher_id' => 'ICT067'],
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
