<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Question;
use App\Answer;
use Auth;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request, Survey $survey)
    {
        // remove the token
        $arr = $request->except('_token');
        foreach ($arr as $key => $value) {
            $newAnswer = new Answer();
            if (!is_array($value)) {
                $newValue = $value['answer'];
            } else {
                $newValue = json_encode($value['answer']);
            }
            $newAnswer->answer = $newValue;
            $newAnswer->question_id = $key;
            $newAnswer->user_id = Auth::id();
            $newAnswer->survey_id = $survey->id;

            $newAnswer->save();
        };

        return redirect()->action('SurveyController@viewSurveyAnswers', [$survey->id]);
    }
}
