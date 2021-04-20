<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Questions;
class QuestionController extends Controller
{
    public function index(){
    $question = Questions::all();
    return response()->json(['Question',$question]);

    }
    public function getanswerOfQuestion($id_q){



    }
}
