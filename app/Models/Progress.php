<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Progress extends Model
{
    protected $table = 'progress';
    protected $fillable = [
        'user_id',
        'scene_id',
        'attempts',
        'failed_attempts',
        'start_time',
        'finish_time',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scene(): BelongsTo
    {
        return $this->belongsTo(Scene::class);
    }
}
