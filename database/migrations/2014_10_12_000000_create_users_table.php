<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_general_ci';


            $table->increments('id');

            $table->string('name')->nullable()->unique()->comment('用户名');

            $table->string('true_name')->nullable()->comment('用户真实姓名');

            $table->string('email')->nullable()->unique();

            $table->string('mobile')->nullable()->unique()->comment('手机号');

            $table->string('api_token')->nullable()->unique()->comment('token');

            $table->timestamp('email_verified_at')->nullable();

            $table->string('password');

            $table->string('avatar')->nullable()->comment('用户头像');

            $table->unsignedInteger('school_id')->nullable()->comment('用户高校id');

            $table->tinyInteger('gender')->default(1)->comment('性别：1男，2女，3保密');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
