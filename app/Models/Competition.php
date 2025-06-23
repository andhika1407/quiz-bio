<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    protected $table = 'competition';

    protected $fillable = [
        'degree',
        'nama',
        'competition_start',
        'competition_end'
    ];

    public function users() 
    {
        return $this->hasMany(User::class, 'competition_id');
    }

    public function questions() 
    {
        return $this->hasMany(Question::class, 'competition_id');
    }
}
