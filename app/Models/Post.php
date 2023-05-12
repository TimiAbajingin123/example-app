<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'image', 'user_id'];
    use HasFactory;
    public function user()
    {
        return $this -> belongsTo('App\Models\User');
    }
    public function comment()
    {
        return $this -> morphMany('App\Models\Comment', 'commentable');
    }
    public function review()
    {
        return $this -> hasMany(Review::class);
    }
}
