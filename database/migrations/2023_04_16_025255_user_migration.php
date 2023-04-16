<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('adminUser',function(Blueprint $table){
            $table->id();
            $table->string('name');
            $table->string('adminId');
            $table->string('adminClass');
            $table->string('mobile');
            $table->string('password');
            $table->timestamps();


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
