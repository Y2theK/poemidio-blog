<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'body',
        'description',
        'category_id',
        'user_id'
    ];
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function comments()
    {
        return $this->hasMany("\App\Models\Comment")->orderBy('id', 'desc');
    }
    public function likes()
    {
        return $this->hasMany("\App\Models\likes");
    }
    public function user()
    {
        return $this->belongsTo('\App\Models\User');
    }
    protected static function boot()
    {
        parent::boot();
        if (auth()->check()) {
            self::creating(function ($model) {
                $model->user_id = auth()->id();
            });
        }
    }
}
