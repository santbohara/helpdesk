<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'questions_id',
        'yes',
        'no'
    ];
}
