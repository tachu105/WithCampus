<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityDetailImg extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'activity_detail_imgs';

    /**
     * ネイティブタイプへのキャストが必要な属性
     *
     * @var array
     */
    protected $casts = [
        'activity_detail_id' => 'integer',
    ];

    /**
     * 活動詳細情報とのリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activityDetail()
    {
        return $this->belongsTo(ActivityDetail::class, 'activity_detail_id');
    }

    /**
     * モデルの一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'activity_detail_id',
        'img_url',
    ];
}