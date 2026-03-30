<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $primaryKey = 'NewsId';

    protected $fillable = [
        'Title',
        'Content',
        'Author',
        'ImageUrl',  // Now stores base64 encoded images
        'Category',
        'IsPublished',
        'UserId'
    ];

    protected $casts = [
        'IsPublished' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    /**
     * Get the image as a base64 data URL
     * This is helpful if you need to ensure proper formatting
     */
    public function getImageAttribute()
    {
        if ($this->ImageUrl && !str_starts_with($this->ImageUrl, 'data:image')) {
            // If it's already a base64 string but missing the data URL prefix
            return 'data:image/png;base64,' . $this->ImageUrl;
        }
        return $this->ImageUrl;
    }

    /**
     * Check if news has an image
     */
    public function hasImage()
    {
        return !empty($this->ImageUrl);
    }

    /**
     * Get image size in KB (approximate for base64)
     */
    public function getImageSizeKB()
    {
        if (!$this->hasImage()) {
            return 0;
        }

        // Base64 encoded data is approximately 33% larger than the original
        $base64Length = strlen($this->ImageUrl);
        $sizeInBytes = ($base64Length * 0.75);
        return round($sizeInBytes / 1024, 2);
    }
}
