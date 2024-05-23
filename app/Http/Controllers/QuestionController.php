<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Option;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return Inertia::render("CreateQuestion");
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'question' => 'required|string',
            'option1' => 'required|string',
            'option2' => 'required|string',
            'option3' => 'required|string',
            'option4' => 'required|string',
            'correct_answer' => 'required|string',
        ]);

        // Create the question record
        $question = Question::create([
            'question' => $validatedData['question'],
        ]);

        // Create the options record
        Option::create([
            'question_id' => $question->id,
            'option1' => $validatedData['option1'],
            'option2' => $validatedData['option2'],
            'option3' => $validatedData['option3'],
            'option4' => $validatedData['option4'],
            'correct_answer' => $validatedData['correct_answer'],
        ]);

        return redirect()->route('question.create');
    }
}
