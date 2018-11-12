<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class School extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('school', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');

            $table->string('school_name')->unique()->comment('高校名称');

            $table->string('school_logo')->nullable()->comment('高校logo');

            $table->unsignedInteger('favorite_number')->default(0)->comment('关注的人数');

            $table->unsignedInteger('member_number')->default(0)->comment('成员总数');


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
        Schema::dropIfExists('school');
    }
}
