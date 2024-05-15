<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 過去実績情報の画像を管理するテーブル
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achivement_imgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('achivement_id')->constrained('achivements')->onDelete('cascade');
            $table->string('img_url', 200)->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('achivement_imgs');
    }
};
