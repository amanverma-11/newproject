<?php

namespace App\Models;

use App\Models\Quiz;
use App\Models\Option;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
    'quiz_id',
    'question',
    'option1',
    'option2',
    'option3',
    'option4',
    'correct_answer'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
