<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;
use App\Models\Response;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['category_id', 'user_id', 'photo', 'title', 'content'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function responses( )
    {
        return $this->hasMany(Response::class);
    }
}
