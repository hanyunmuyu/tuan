<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Community extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('community', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');

            $table->string('community_name')->unique()->comment('社团名称');

            $table->string('community_logo')->nullable()->comment('社团logo');

            $table->unsignedInteger('favorite_number')->default(0)->comment('关注人数');

            $table->unsignedInteger('member_number')->default(0)->comment('成员人数');

            $table->unsignedInteger('school_id')->index()->comment('所属高校id');


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
        Schema::dropIfExists('community');
    }
}
