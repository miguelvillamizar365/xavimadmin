<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'NewsId';

    protected $fillable = [
        'Title', 'Content', 'Author', 'ImageUrl', 'Category', 'IsPublished', 'UserId'
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }
}
