<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'research_topic',
        'teacher_name',
        'research_papers_count',
        'research_lang',
        'delivery_date',
        'notes',
        'user_id',
        'education_level_id',
        'grade',
        'school',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function educationLevel(): BelongsTo
    {
        return $this->belongsTo(EducationLevel::class);
    }
}
