<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculums', function (Blueprint $table) {
            $table->id(); //ID
            $table->string('title'); //タイトル
            $table->string('thumbnail')->nullable(); //サムネイル画像
            $table->text('description')->nullable(); //説明
            $table->text('video_url')->nullable(); //ビデオURL
            $table->integer('always_delivery_flg')->nullable(); //フラグ
            $table->foreignId('grade_id'); //grade_ID
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
        Schema::dropIfExists('curriculums');
    }
};