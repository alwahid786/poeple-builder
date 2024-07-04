<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepliedVideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_reply_id',
        'video_id',
        'video_path',
        'user_id',
        'thumbnail',
        'day'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeCompanyReplyAccess($query)
    {
        return $query->whereHas('user', function($query){
            $query->where('added_by', auth()->user()->id);
            $query->orWhereHas('userCompany', function($query){
                $query->where('is_community', 1);
            });
        });
    }


    public function scopeUserReplyAccess($query)
    {
        return $query->whereHas('user', function($query){
            $query->whereHas('userCompany', function($query){
                $query->where('is_community', 1);
                $query->orWhere(function($query){
                    $query->where('id', auth()->user()->added_by);
                    $query->where('is_employee', 1);
                });
            });
        });
    }

    public function views()
    {
        return $this->hasMany(RepliedVideoViews::class);
    }

    public function video(){
        return $this->belongsTo(CompanyVideo::class);
    }
}
