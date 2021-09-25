<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    public function createSubjectView(){
        return view('subjects.createSubject');
    }
    public function createSubject(SubjectRequest $request){
        $subject = new Subject();

        $subject->subject = $request->input('subject');

        $subject->save();
        return redirect(route('user.admin'))->with('success','Предмет успешно создан!');
    }
}
