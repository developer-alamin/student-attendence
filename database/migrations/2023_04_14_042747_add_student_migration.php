<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStudentMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student',function(Blueprint $table)
        {
           $table->integer('mobile')->after('roll');
           $table->string('class')->after('mobile');
           $table->string('photo')->after('class'); 
           $table->string('status')->after('photo'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
