<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use App\Http\Requests\AnswerRequest;

class AnswerController extends Controller
{
    public function createView(){
        return view('answers.createAnswer');
    }
    public function createAnswer(AnswerRequest $request){
        $newAnswer = new Answer();

        $newAnswer->answer = $request->input('answer');

        $newAnswer->save();
        return redirect(route('user.admin'))->with('success','Ответ успешно создан!');
    }
}
