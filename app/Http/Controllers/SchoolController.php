<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolController extends Controller
{
    public function showAnswers()
    {
        $school_id = request('school_id');
        $year = request('year');

        if(empty($year)){
            $year = now()->year;
        }

        $school = DB::table('school')
            ->where('school_id', $school_id)
            ->first();
        
        if (!$school) {
            abort(404);
        }
        
        $answers = DB::table('answer')
            ->join('survey_question', 'answer.survey_question_id', '=', 'survey_question.survey_question_id')
            ->where('answer.school_id', $school_id)
            ->where('answer.period_year', $year)
            ->select('survey_question.question', 'survey_question.order', 'answer.answer')
            ->orderBy('survey_question.order')
            ->get();

        // return view('public.school-answers', compact('school', 'answers'));
        return view('public.school-answers', compact('school', 'answers'))
            ->with('title', 'Detail Jawaban Survey - ' . $school->name);
    }
}