<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showQuestion(Question $question){
        //check again
        $comments = Comment::where('que_id' ,$question->id)->get();
        foreach($comments as $comment){
            $user = User::where('id',$comment->user_id)->first();
            $comment['by_username'] = $user->username;
            $d=strtotime($comment->updated_at);
            $comment['posted_at']=date("l, h:i:sa Y-m-d", $d);
        }
        $questions = Question::where('que_cat_id' ,$question->que_cat_id)->get();
        foreach($questions as $ques){
            $user = User::where('id',$ques->user_id)->first();
            $question['by_username'] = $user->username;
            $d=strtotime($ques->updated_at);
            $question['posted_at']=date("l, h:i:sa Y-m-d", $d);
        }
        return view('showcategory', ['question' => $question, 'comments' => $comments, 'questions'=>$questions]);  
    }

    public function create(Category $category, Request $request){
        
        $request->validate([
            'title' => 'required'
        ]);
        
        
        $newQue['que_cat_id']= $category->id;
        $newQue['que_title']= $request->title;
        $newQue['que_desc']= $request->description;
        $newQue['user_id']= 1;
        $question = Question::create($newQue);

        if(!$question){
            return redirect(route('category.add'))->with("error", "Adding question failed!, try again.");
        }
        return redirect(route('category.all'))->with("success", "Question added successfully, you can view now");
        
        
        //dd($request);
    }
}
