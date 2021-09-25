<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Teacher;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    public function test(Request $request,$id){
        $data['teacher'] = Teacher::findOrFail($id);

        $data['question'] = Question::findOrFail($id);

        $data['subject_of_teacher'] = DB::table('subject_of_teachers')
        ->join('subjects','subjects.id','=','subject_of_teachers.subject_id')
        ->where('teacher_id','=',$data['teacher']['id'])
        ->get();        
        
        $answer_of_questions = DB::table('answer_of_questions')
        ->join('answers','answers.id','=','answer_of_questions.answer_id')
        ->where('question_id','=',$data['question']['id'])
        ->get();
    

        $data['first_question'] = DB::select('SELECT * FROM questions WHERE id = 1');
    
        $data['first_and_second_answer'] = DB::select('SELECT * FROM answers WHERE id > 0 AND id < 3');
       
        if(!empty($_POST['answer_id'])){
            foreach($_POST['answer_id'] as $chosen_answer){
                $answer_of_questions = DB::insert('INSERT INTO answer_of_questions (question_id,answer_id) VALUES(?,?) ',[$data['question']['id'],$chosen_answer]);  
            }
        }   
        

        return view('test.testView',$data);
    }
}

 // $result = $request->session()->get('key','default'); // Если не такого ключа выведет дефолт
      
       
        // $request->session()->push('id',$id); // Добавление нового значения в массив сессии
        // $request->session()->forget('id'); //Удаление сессии
        // $request->session()->flush(); //Удаляет все из сессии
        // $request->session()->save(); // Сохранение сессии
        // $request->session()->has('id'); //Существует ли указанная сессия
    //     $all = session()->all();  // Вывод всего из сессии
    //    dd($all);
        // $session = Session::all();
        // if($some = session()->has('key')){
        //     action($some);
        // }