<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Questions;
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

}
