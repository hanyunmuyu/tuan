<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class District extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('district', function (Blueprint $table) {

            $table->charset = 'utf8';

            $table->collation = 'utf8_unicode_ci';

            $table->increments('id');

            $table->string('code')->index()->comment('地区的唯一代码');

            $table->string('name')->comment('地区名称');

            $table->unsignedInteger('pid')->default(0)->comment('上级id');
            $table->unique(['code', 'pid']);
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
        Schema::dropIfExists('district');
    }
}
