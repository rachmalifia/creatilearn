<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuizController extends Controller
{
    public function showQuestion(int $subject_id)
    {
        return view('quiz', [
            'title' => 'Kuis',
            'quizes' => Quiz::with('subject')->where('subject_id', $subject_id)->get(),
        ]);
    }
}
