<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainView(){
        $data['teachers'] = Teacher::all();
        return view('main.index',$data);
    }
}
