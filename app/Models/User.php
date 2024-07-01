<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'bio',
        'image',
        'user_type',
        'phone_number',
        'daily_video_types',
        'added_by',
        'is_community',
        'is_employee',
        'system_id',
        'status',
        'monthly_budget',
        'grand_prize',
        'super_prize',
        'other_prize',
    ];

    protected $appends = ['company_logo'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getImageAttribute($value)
    {
        if(empty($value)){
            return env('ASSET_URL').'/assets/images/dummy-profile.png';
        }
        return $value;
    }

    public function userCompany(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function companyUsers(){
        return $this->hasMany(User::class, 'added_by');
    }


    // get company logo
    public function getCompanyLogoAttribute()
    {
        if (auth()->user()->user_type == 'user') {
            $company_logo = User::where('id', auth()->user()->added_by)->value('image');
            return $company_logo;
        }
    }
}
