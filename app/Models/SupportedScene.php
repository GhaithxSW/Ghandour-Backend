<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SupportedScene extends Model
{
    protected $table = 'supported_scenes';
    protected $fillable = [
        'scene_id',
        'user_id',
    ];

    public function scene(): BelongsTo
    {
        return $this->belongsTo(Scene::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
