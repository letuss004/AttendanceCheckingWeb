<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('department')->unique();
            $table->timestamps();

            $table->index('id');
        });
        $values = [
            ['department' => 'ICT'],
            ['department' => 'FST'],
            ['department' => 'CS'],
            ['department' => 'PMAB'],
            ['department' => 'WEO'],
            ['department' => 'MST'],
            ['department' => 'MATH'],
            ['department' => 'AMSN'],
            ['department' => 'CHEM'],
            ['department' => 'EN'],
            ['department' => 'EPE'],
        ];
        DB::table('departments')->insert($values);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
