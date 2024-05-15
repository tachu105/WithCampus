<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AreaTag extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'area_tags';

    /**
     * 一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * ユーザー・エリアタグの中間テーブルとのリレーションシップ
     */
    public function userAreaTags()
    {
        return $this->hasMany(UserAreaTag::class, 'area_tag_id');
    }
}