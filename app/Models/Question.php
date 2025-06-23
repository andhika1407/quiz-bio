<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';

    protected $fillable = [
        'competition_id',
        'question',
        'question_type',
        'question_image',
        'question_correct_answer',
        'score'
    ];
}
