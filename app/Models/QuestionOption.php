<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    public $timestamps = true;
    
    protected $table = 'question_options';

    protected $fillable = [
        'question_id',
        'option_text'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
