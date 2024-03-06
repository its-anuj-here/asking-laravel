<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        $categories = Category::all();
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
            return redirect(route('addcategory'))->with("error", "Adding category failed!, try again.");
        }
        return redirect(route('allcategory'))->with("success", "Category adding successful, you can post now");
    }

    public function updateCategory(){
        return view('updatecategory');
    }
}
