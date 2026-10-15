<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    // Allow mass assignment for these columns
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
        'total_questions',
        'attempts'
    ];

    // Relationship to the User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to the Quiz
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}