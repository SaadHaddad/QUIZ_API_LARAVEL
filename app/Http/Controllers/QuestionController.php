<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\quiz_run;
class QuestionController extends Controller
{
    public function index(){
    $question = Questions::all();
    return response()->json($question);

    }

    public function userlist(){
        $user = User::all();
        return response()->json($user);

    }


    public function show($id)
    {
        $Question = Questions()->find($id);
        if (!$Question) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, question  with id ' . $id . ' cannot be found.'
            ], 400);
        }
        return $Question;
    }
    public function getState()
    {
        $star = quiz_run::find(1);
        if (!$star) {
            return response()->json([
                'success' => false
            ], 400);
        }
      return  response()->json(['state',$star->start]) ;

    }
    public function setState()
    {
        $star = quiz_run::find(1);
        if ( $star->start ==1)
        {
            $star->start =0;
        }else
        {
            $star->start =1;
        }
        $star->save();
    }


}
