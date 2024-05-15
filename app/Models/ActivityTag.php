<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityTag extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'activity_tags';

    /**
     * モデルの一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
    ];

    /**
     * ユーザー・アクティビティタグの中間テーブルとのリレーションシップ
     */
    public function userActivityTags()
    {
        return $this->hasMany(UserActivityTag::class, 'activity_tag_id');
    }
}
