<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('attendance_status_id');
            $table->unsignedBigInteger('qr_id');
            $table->unsignedBigInteger('lesson_id');
            $table->string('student_id');
            $table->timestamps();
            $table->foreign('attendance_status_id')->references('id')->on('attendance_statuses');
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('qr_id')->references('id')->on('qrs');
        });
        $values = [
            [
                'attendance_status_id' => 1,
                'qr_id' => 1,
                'lesson_id' => 1,
                'student_id' => 'BA9067'
            ],
            [
                'attendance_status_id' => 1,
                'qr_id' => 2,
                'lesson_id' => 1,
                'student_id' => 'BA9067'
            ],
        ];
        DB::table('attendances')->insert($values);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
