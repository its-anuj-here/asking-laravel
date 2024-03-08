<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function showQuestion(){

    }

    public function create(Request $request, $id){
        /*
        $request->validate([
            'title' => 'required'
        ]);
        $category = Category::where('cat_id' ,(int) $id)->get();
        if($category->isNotEmpty())
        $newCategory['cat_name']= $request->name;
        $newCategory['cat_desc']= $request->description;
        $category = Category::create($newCategory);

        if(!$category){
            return redirect(route('addcategory'))->with("error", "Adding category failed!, try again.");
        }
        return redirect(route('category.all'))->with("success", "Category adding successful, you can post now");
        */
        
        dd((int)$id);
    }
}
