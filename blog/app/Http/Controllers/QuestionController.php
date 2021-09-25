<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{   
    public function createView(){
        return view('questions.newQuestion');
    }   
    public function createQuestion(QuestionRequest $request){
        $newQuestion = new Question();
        $newQuestion->question = $request->input('question');
        $newQuestion->save();
        return redirect(route('user.admin'))->with('success','Вопрос успешно создан!');
    }
}
