<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    public function videos(){
        return $this->hasMany(CompanyVideo::class,"daily_video_types","name");
    }


}
