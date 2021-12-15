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
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('student_id');
            $table->timestamps();
        });
        $values = [
            [
                'attendance_status_id' => 1,
                'lesson_id' => 1,
                'student_id' => 1
            ],
            [
                'attendance_status_id' => 1,
                'lesson_id' => 2,
                'student_id' => 1
            ],
            [
                'attendance_status_id' => 1,
                'lesson_id' => 3,
                'student_id' => 1
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
