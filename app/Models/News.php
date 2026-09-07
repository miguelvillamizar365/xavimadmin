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
        'ImageUrl',
        'InstagramUrl',
        'SpotifyUrl',
        'FacebookUrl',
        'Category',
        'IsPublished',
        'UserId',
    ];

    protected $casts = [
        'IsPublished' => 'boolean',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    // ─── Relationship ────────────────────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class, 'UserId');
    }

    // ─── Image helpers ───────────────────────────────────────────────────────

    public function getImageAttribute()
    {
        if ($this->ImageUrl && !str_starts_with($this->ImageUrl, 'data:image')) {
            return 'data:image/png;base64,' . $this->ImageUrl;
        }
        return $this->ImageUrl;
    }

    public function hasImage(): bool
    {
        return !empty($this->ImageUrl);
    }

    public function getImageSizeKB(): float
    {
        if (!$this->hasImage()) return 0;
        return round((strlen($this->ImageUrl) * 0.75) / 1024, 2);
    }

    // ─── Instagram helpers ───────────────────────────────────────────────────

    public function hasInstagram(): bool
    {
        return !empty($this->InstagramUrl);
    }

    /**
     * Detecta si la URL de Instagram es un Reel/Video.
     * Los reels tienen /reel/ en la URL.
     */
    public function isInstagramReel(): bool
    {
        return $this->hasInstagram() &&
               str_contains($this->InstagramUrl, '/reel/');
    }

    // ─── Spotify helpers ─────────────────────────────────────────────────────

    public function hasSpotify(): bool
    {
        return !empty($this->SpotifyUrl);
    }

    /**
     * Convierte URL pública de Spotify a URL de embed.
     * https://open.spotify.com/track/ID  →  https://open.spotify.com/embed/track/ID
     * También soporta album, playlist, episode.
     */
    public function getSpotifyEmbedUrl(): ?string
    {
        if (!$this->hasSpotify()) return null;

        $url = $this->SpotifyUrl;

        // Si ya es embed, devolverla tal cual
        if (str_contains($url, '/embed/')) return $url;

        // Reemplazar open.spotify.com/ por open.spotify.com/embed/
        return preg_replace(
            '#open\.spotify\.com/(track|album|playlist|episode)/#',
            'open.spotify.com/embed/$1/',
            $url
        );
    }

    // ─── Facebook helpers ────────────────────────────────────────────────────

    public function hasFacebook(): bool
    {
        return !empty($this->FacebookUrl);
    }

    /**
     * Detecta si la URL de Facebook es un video.
     * Los videos tienen /videos/ en la URL.
     */
    public function isFacebookVideo(): bool
    {
        return $this->hasFacebook() &&
               str_contains($this->FacebookUrl, '/videos/');
    }
}