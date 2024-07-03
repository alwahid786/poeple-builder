<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'thumbnail',
        'video_path',
        'user_id',
        'daily_video_types'
    ];

    public function repliedVideo(){
        return $this->hasMany(RepliedVideo::class, 'video_id');
    }


    public function wathedVideo(){
        return $this->hasOne(WatchedVideo::class, 'video_id');
    }



    
}
