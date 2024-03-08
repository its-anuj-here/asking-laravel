<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        $categories = Category::all();
        foreach($categories as $category){
            $category['questions'] = Question::where('que_cat_id',$category->id)->count();
        }
        return view('allcategory', ["categories"=>$categories]);
    }

    public function addCategory(){
        return view('addcategory');
    }

    public function createCategory(Request $request){
        $request->validate([
            'name' => 'required|unique:categories,cat_name',
            'description' => 'nullable'
        ]);

        $newCategory['cat_name']= $request->name;
        $newCategory['cat_desc']= $request->description;
        $category = Category::create($newCategory);

        if(!$category){
            return redirect(route('category.add'))->with("error", "Adding category failed!, try again.");
        }
        return redirect(route('category.all'))->with("success", "Category adding successful, you can post now");
    }

    public function updateCategory(){
        return view('updatecategory');
    }

    public function showCategory(Category $category){
        $categories = Category::orderBy('cat_views','DESC')->limit(3)->get();
        foreach($categories as $cat){
            $cat['questions'] = Question::where('que_cat_id',$cat->id)->count();
        }
        $questions = Question::where('que_cat_id' ,$category->id)->get();
        return view('catdiscuss', ['category' => $category, 'categories' => $categories, 'questions'=>$questions]);        
    }

}
