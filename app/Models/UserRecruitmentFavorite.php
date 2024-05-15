<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRecruitmentFavorite extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'user_recruitment_favorite';

    /**
     * モデルの一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'recruitment_id',
    ];

    /**
     * ネイティブタイプへのキャストが必要な属性
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'recruitment_id' => 'integer',
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
     * リクルートメントとのリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class, 'recruitment_id');
    }
}
