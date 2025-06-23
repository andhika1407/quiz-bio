<?php

// model QuizAttemptController
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Competition;
use App\Models\QuizAnswer;

class QuizAttempts extends Model
{   
    public $timestamps = false;

    protected $table = 'quiz_attempt';

    protected $fillable = [
        'user_id',
        'competition_id',
        'correct_answer',
        'wrong_answer',
        'started_at',
        'finished_at',
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class);
    }

    public function answers()
    {
        return $this->hasMany(QuizAnswer::class, 'quiz_attempt_id');
    }

    public function options() {
        return $this->hasMany(QuestionOption::class);
    }
}
