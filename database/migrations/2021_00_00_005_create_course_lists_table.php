<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        $values = [
            ['name' => 'Object-oriented Systems Analysis and Design'],
            ['name' => 'Web Application Development'],
            ['name' => 'Machine learning and Data mining I'],
            ['name' => 'Graph Theory'],
            ['name' => 'Mobile Application Development'],
            ['name' => 'Advanced Databases'],
            ['name' => 'Distributed Systems'],
            ['name' => 'Network Simulation'],
        ];
        DB::table('course_lists')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_lists');
    }
}
