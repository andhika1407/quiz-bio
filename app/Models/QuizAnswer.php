<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    public $timestamps = true;

    protected $table = 'quiz_answers';

    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'user_answer',
        'status'
    ];

    
    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempts::class, 'quiz_attempt_id');
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
