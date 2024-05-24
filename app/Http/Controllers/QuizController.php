<?php

namespace App\Http\Controllers;


use App\Models\Quiz;
use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    public function showQuizzes(){
        $quizzes = Quiz::all();
        return Inertia::render('Quizzes', ['quizzes' => $quizzes]);
    }

    public function showQuiz()
    {
        $questions = Question::with('options')->get();
        $user = Auth::user();
        return Inertia::render('Quiz', ['questions' => $questions, 'user' => $user]);
    }

    public function submitQuiz(Request $request)
    {
        $user = Auth::user();
        $newScore = $request->input('score'); 

        // Update the score if the new score is greater
        if ($newScore > $user->score) {
            $user->score = $newScore;
            $user->save();
        }

        return response()->json(['maxScore' => $newScore], 200);
    }

}
