<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RecruitmentImg extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'recruitment_imgs';

    /**
     * モデルの一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'recruitment_id',
        'img_url',
    ];

    /**
     * ネイティブタイプへのキャストが必要な属性
     *
     * @var array
     */
    protected $casts = [
        'recruitment_id' => 'integer'
    ];

    /**
     * リクルートメント情報とのリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class, 'recruitment_id');
    }
}
