<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'group_tag',
        'icon_img_url',
        'belong_univ_name',
        'rep_name'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 活動詳細情報とのリレーションシップ
     */
    public function activityDetail()
    {
        return $this->hasMany(ActivityDetail::class);
    }

    /**
     * 実績情報とのリレーションシップ
     */
    public function achievement()
    {
        return $this->hasMany(Achievement::class);
    }

    /**
     * リクルート情報とのリレーションシップ
     */
    public function recruit()
    {
        return $this->hasMany(Recruit::class);
    }

    /**
     * ユーザー・アクティビティタグの中間テーブルとのリレーションシップ
     */
    public function userActivityTag()
    {
        return $this->hasMany(UserActivityTag::class);
    }

    /**
     * ユーザー・エリアタグの中間テーブルとのリレーションシップ
     */
    public function userAreaTag()
    {
        return $this->hasMany(UserAreaTag::class);
    }

    /**
     * ユーザーのお気に入り情報とのリレーションシップ
     */
    public function userRecruitmentFavorite()
    {
        return $this->hasMany(UserRecruitmentFavorite::class);
    }

}
