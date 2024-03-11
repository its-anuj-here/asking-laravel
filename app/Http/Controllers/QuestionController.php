<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showQuestion(){

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
