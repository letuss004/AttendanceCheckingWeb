<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('qr_status_id')->default(1);
            $table->string('name')->nullable();
            $table->timestamps();
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->foreign('qr_status_id')->references('id')->on('qr_statuses');
        });
        $values = [
            [
                'qr_status_id' => 1,
                'lesson_id' => 1,
                'name' => 'first qr'
            ],
            [
                'qr_status_id' => 1,
                'lesson_id' => 1,
                'name' => 'second qr'
            ],
            [
                'qr_status_id' => 1,
                'lesson_id' => 1,
                'name' => '3rd qr'
            ],
        ];
        DB::table('qrs')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qrs');
    }
}
