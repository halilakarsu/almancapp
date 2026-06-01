<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    protected $fillable = [
        'level_title',
        'level_slug',
        'order_index',
        'is_active',
        'level_description',
        'level_image',
    ];


    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
