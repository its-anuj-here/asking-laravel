<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\Comment;
use App\Models\User;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function show(Question $question){
        
        $comments = Comment::where('que_id' ,$question->id)->get();
        foreach($comments as $comment){
            $user = User::where('id',$comment->user_id)->first();
            $comment['by_username'] = $user->username;
            $d=strtotime($comment->updated_at);
            $comment['posted_at']=date("l, h:i:sa Y-m-d", $d);
        }
        $questions = Question::where('que_cat_id' ,$question->que_cat_id)->orderBy('que_views','DESC')->limit(3)->get();
        foreach($questions as $ques){
            $ques['comments'] = Comment::where('que_id',$ques->id)->count();
            $user = User::where('id',$ques->user_id)->first();
            $ques['by_username'] = $user->username;
            $d=strtotime($ques->updated_at);
            $ques['posted_at']=date("l, h:i:sa Y-m-d", $d);
        }
        if(parse_url(url()->previous(), PHP_URL_PATH) != "/question/".$question->id."/show"){
            $inc['que_views'] = ((int) $question->que_views) + 1;
            $question->update($inc);
        }
        $user = User::where('id',1)->first();
        return view('showque',['question' => $question, 'comments' => $comments, 'questions'=>$questions,'user' => $user]);  
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
            return redirect(route('category.show', ['category' => $category]))->with("error", "Adding question failed!, try again.");
        }
        return redirect(route('category.show', ['category' => $category]))->with("success", "Question added successfully, you can view now");
    }
    public function edit(Question $question){
        $user = User::where('id',1)->first();
        return view('editque', ['question' => $question, 'user' => $user]);
    }

    public function update(Question $question, Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);
        $updated['que_title']= $request->title;
        $updated['que_desc']= $request->description;
        $question->update($updated);
        
        return redirect(route('question.show', ['question'=> $question]))->with("success", "Question updated");
    }
    public function delete(Question $question){
        $category = Category::where('id', $question->que_cat_id)->first();
        $question->delete();

        return redirect(route('category.show', ['category' => $category]))->with("success", "Question deleted successfully");
    }

    public function createCom(Question $question, Request $request){
        $request->validate([
            'comment' => 'required'
        ]);
        
        $newCom['que_id']= $question->id;
        $newCom['comment']= $request->comment;
        $newCom['user_id']= 1;
        $comment = Comment::create($newCom);

        if(!$comment){
            return redirect(route('question.show', ['question' => $question]))->with("error", "Adding comment failed!, try again.");
        }
        return redirect(route('question.show', ['question' => $question]))->with("success", "Comment added successfully.");
    }
}
