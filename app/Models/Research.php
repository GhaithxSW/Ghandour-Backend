<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Research extends Model
{
    use HasFactory;

    protected $table = 'researches';
    protected $fillable = ['title', 'image', 'content', 'pdf_file', 'docx_file'];

}
