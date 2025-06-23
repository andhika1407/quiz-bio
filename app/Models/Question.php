<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = true;
    
    protected $table = 'questions';

    protected $fillable = [
        'competition_id',
        'question',
        'question_type',
        'question_image',
        'question_correct_answer',
        'score'
    ];

    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function answers()
    {
    return $this->hasMany(QuizAnswer::class);
    }

}
