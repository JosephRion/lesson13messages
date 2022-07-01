<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTitleToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            //L13C10.1 カラムを増やすマイグレーション
            //$table->string('title'); //下で文字長10文字以内でカラムを追加するコマンドがあるので、この行は削除
            
            //文字数を10文字以内に限定するコード20220.7.01..1456TKT
            $table->string('title', 10); //文字長10文字のカラムを追加するコマンド
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            //L13C10.1 up()で増やしたカラムを、マイグレーションのロールバックの時に削除するコマンド
            $table->dropColumn('title');
            
        });
    }
}
