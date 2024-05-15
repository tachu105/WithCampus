<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * ユーザー情報を管理するテーブル
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255);
            $table->unsignedInteger('group_tag');
            $table->string('icon_img_url', 255)->nullable()->default(null);
            $table->string('belong_univ_name', 255)->nullable()->default(null);
            $table->string('rep_name', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name', 255);
        //     $table->string('email', 255)->unique();
        //     $table->string('password', 255);
        //     $table->unsignedInteger('group_tag')->default(0);
        //     $table->string('icon_img_url', 200)->nullable();
        //     $table->string('belong_univ_name', 255)->nullable();
        //     $table->string('rep_name', 255)->default("defaultvalue");
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->rememberToken();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });
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
};
