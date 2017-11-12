<?php

namespace App\Http\Controllers;

use Auth;
use App\Survey;
use App\Answer;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Homepage function
    public function home(Request $request)
    {
        $surveys = Survey::get();
        return view('home', compact('surveys'));
    }

    // Show page to create new survey
    public function newSurvey()
    {
        return view('survey.new');
    }

    public function create(Request $request, Survey $survey)
    {
        $arr = $request->all();
        // $request->all()['user_id'] = Auth::id();
        $arr['user_id'] = Auth::id();
        $surveyItem = $survey->create($arr);
        return Redirect::to("/survey/{$surveyItem->id}");
    }

    // Retrieve detail page and add questions here
    public function detailSurvey(Survey $survey)
    {
        $survey->load('questions.user');
        return view('survey.detail', compact('survey'));
    }


    public function edit(Survey $survey)
    {
        return view('survey.edit', compact('survey'));
    }

    // Edit survey
    public function update(Request $request, Survey $survey)
    {
        $survey->update($request->only(['title', 'description']));
        return redirect()->action('SurveyController@detailSurvey', [$survey->id]);
    }

    // View survey publicly and complete survey
    public function viewSurvey(Survey $survey)
    {
        $survey->option_name = unserialize($survey->option_name);
        return view('survey.view', compact('survey'));
    }

    // View submitted answers from current logged in user
    public function viewSurveyAnswers(Survey $survey)
    {
        $survey->load('user.questions.answers');
        return view('answer.view', compact('survey'));
    }

    public function deleteSurvey(Survey $survey)
    {
        $survey->delete();
        return redirect('');
    }
}
