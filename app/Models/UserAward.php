<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAward extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'award_id',
        'day',
        'reward_type',
        'price',
        'company_id',
        'spin_type'
    ];

    public function award(){
        return $this->belongsTo(Award::class, 'award_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
