<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Vimeo\Laravel\Facades\Vimeo;

class VimeoItem extends Model
{
    protected $guarded = [
        'id',
    ];

    // リレーション
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Utility
    public function videoAll()
    {
        return Vimeo::request("/me/$this->path");
    }
    public function videoUrl()
    {
        return Vimeo::request("/me/$this->path")["body"]["player_embed_url"];
    }
}
