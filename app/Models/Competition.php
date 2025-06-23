<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public $timestamps = true;
    
    protected $table = 'competition';

    protected $fillable = [
        'degree',
        'nama',
        'competition_start',
        'competition_end'
    ];

    public function users() {
        return $this->hasMany(User::class);
    }

    public function quizAttempts() {
        return $this->hasMany(QuizAttempts::class);
    }

    public function questions() {
        return $this->hasMany(Question::class);
    }
}
