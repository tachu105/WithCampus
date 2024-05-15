<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserActivityTag extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'user_activity_tag';

    /**
     * モデルの一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'activity_tag_id',
    ];

    /**
     * ネイティブタイプへのキャストが必要な属性
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'activity_tag_id' => 'integer',
    ];

    /**
     * ユーザーとのリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * 活動系統のタグとのリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activityTag()
    {
        return $this->belongsTo(ActivityTag::class, 'activity_tag_id');
    }
}
