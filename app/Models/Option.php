<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id', 'option1', 'option2', 'option3', 'option4', 'correct_answer'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
