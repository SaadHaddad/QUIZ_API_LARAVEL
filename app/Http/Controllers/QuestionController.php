<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Questions;
use App\Models\quiz_run;
use Validator;
use function GuzzleHttp\Promise\all;

class QuestionController extends Controller
{
    public function index(){
   // $question = Questions::all();
        $question = Questions::where('etat','1')->orderBy('score', 'ASC')->get();
    return response()->json($question);

    }
    public function allQuestion(){
         $question = Questions::orderBy('score', 'ASC')->get();
        return response()->json($question);

    }


    public function userlist(){
        $user = User::orderBy('score', 'DESC')->get();

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
        if(!$star)
        {
            $app = new quiz_run;
            $app->start= 1;
            $app->id = 1;
            $app->save();

        }

        if ( $star->start ==1)
        {
            $star->start =0;
        }else
        {
            $star->start =1;
        }
        $star->save();
    }

   public function selectQuestion(Request $request,$id)
   {
      $qe = Questions::find($id);
       if (!$qe) {
           return response()->json([
               'success' => false,
               'message' => 'Sorry, question  with id ' . $id . ' cannot be found.'
           ], 400);
       }

      $qe->etat=$request->input('etat');
      $qe->save();
       return response()->json([
           'success' => true,'etat'=>$qe->etat
       ], 200);

   }

    public function addQuestion(Request $request) {
        $validator = Validator::make($request->all(), [
            'Question' => 'required|string|between:2,100',
            'A1' => 'required|string|between:1,100',
            'A2' => 'required|string|between:1,100',
            'A3' => 'required|string|between:1,100',
            'correct' => 'required|string|between:1,100',
            'score'=>'integer|min:1|max:4'
        ]);


        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $question = Questions::create(array_merge(
            $validator->validated()
        ));


        return response()->json([
            'message' => 'User successfully registered',
            'user' => $question
        ], 201);
    }

}
