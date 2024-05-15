<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Recruitment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * このモデルに関連付けられたテーブルの名前
     *
     * @var string
     */
    protected $table = 'recruitments';

    /**
     * 一括割り当て可能な属性
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 
        'body', 
        'reference_title', 
        'reference_url', 
        'user_id'
    ];

    /**
     * ネイティブタイプへのキャストが必要な属性
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
    ];

    /**
     * リクルート情報を所有しているユーザーを取得
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * リクルート情報の画像を取得
     */
    public function recruitmentImgs()
    {
        return $this->hasMany(RecruitmentImg::class);
    }


    /**
     * ページネーションを利用したクエリスコープ
     *
     * @param int $limit_count 最大取得件数
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getPaginateByLimit(int $limit_count = 2)
    {
        // 更新日時の降順で取得し、ページネーションを適用
        return $this::with('user')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
