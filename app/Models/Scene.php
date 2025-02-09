<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scene extends Model
{
    protected $table = 'scenes';
    protected $fillable = [
        'name',
        'category_id',
        'scene_unity_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function progress(): HasMany
    {
        return $this->hasMany(Progress::class, 'scene_id');
    }

}
