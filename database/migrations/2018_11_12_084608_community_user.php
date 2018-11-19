<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommunityUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('community_user', function (Blueprint $table) {

            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');

            $table->unsignedInteger('community_id')->index()->comment('社团id');

            $table->unsignedInteger('user_id')->index()->comment('用户id');

            $table->enum('type', ['join', 'attention'])->default('attention')->comment('社团用户类型，attention表示关注，join 加入');

            $table->unsignedTinyInteger('status')->default(1)->comment('社团用户状态：0拉黑，1新申请，2申请通过');

            $table->unique(['community_id', 'user_id'])->comment('唯一索引');

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
        Schema::dropIfExists('community_user');
    }
}
