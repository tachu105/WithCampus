<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 活動詳細情報の画像を管理するテーブル
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
        Schema::create('activity_detail_imgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('activity_detail_id')->constrained('activity_details')->onDelete('cascade');
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
        Schema::dropIfExists('activity_detail_imgs');
    }
};
