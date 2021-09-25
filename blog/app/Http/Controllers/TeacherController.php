<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
    public function createTeacherView(){
        return view('teachers.createTeacher');
    }
    public function createTeacher(TeacherRequest $request){
        $newTeacher = new Teacher();

        $newTeacher->name = $request->input('name');

        $newTeacher->save();
        return redirect(route('user.admin'))->with('success','Учитель успешно создан!');
    }
    public function allTeacherView(){
        $data['teachers'] = DB::select('SELECT * FROM teachers');
        return view('teachers.allTeacher',$data);
    }
    public function findTeacherView($id){

        $data['teacher'] = Teacher::findOrFail($id);

        $data['subjects'] = Subject::all();

        $subjects_of_teacher = DB::table('subject_of_teachers')
        ->join('subjects','subjects.id','=','subject_of_teachers.subject_id')
        ->where('teacher_id','=',$data['teacher']['id'])
        ->get();
        
        $data['subject_ids'] = array();

        foreach($subjects_of_teacher as $subject){
            $data['subject_ids'][] = $subject->id;
        }

        if(!empty($_POST['teacher_id'])){
            $subjects_of_teacher = DB::delete('DELETE FROM subject_of_teachers WHERE teacher_id  = ?',[$data['teacher']['id']]);
            if(!empty($_POST['subject_id'])){
                foreach($_POST['subject_id'] as $chosen_subject){
                    $subjects_of_teacher = DB::insert('INSERT INTO subject_of_teachers (teacher_id,subject_id) VALUES(?,?) ',[$data['teacher']['id'],$chosen_subject]);  
                }
            }
            return redirect(route('allTeacher'))->with('success','Предметы успешно обновлены!');
        }
        return view('teachers.oneTeacher',$data);
    }
    public function deleteTeacher($id){
        $teacher = Teacher::find($id);
        $teacher->delete();
        return redirect(route('allTeacher'))->with('success','Учитель успешно удален!');
    }
}
