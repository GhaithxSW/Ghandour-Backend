<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    protected $table = 'games';
    protected $fillable = [
        'name'
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
