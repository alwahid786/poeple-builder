<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedVideoViews extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'reply_video_id', 'watched_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function video()
    {
        return $this->belongsTo(RepliedVideo::class);
    }
}
