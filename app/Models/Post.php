<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'image'];
    public $timestamps = false;

    public function scopeFilter($query, array $filters) {
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%');
        }

    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function postsComments()
    {
        return $this->belongsToMany(PostComment::class, 'posts_comments');
    }

    public function postsCategories()
    {
        return $this->belongsToMany(PostCategory::class, 'posts_categories');
    }

    public function wishlist() {
        return $this->belongsToMany(Wishlist::class, 'wishlists');
    }
}
