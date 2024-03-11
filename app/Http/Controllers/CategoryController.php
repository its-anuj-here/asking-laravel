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

    public function showCategory(Category $category){
        if(parse_url(url()->previous(), PHP_URL_PATH) != "/category/".$category->id."/edit"){
            $inc['cat_views'] = ((int) $category->cat_views) + 1;
            $category->update($inc);
        }
        $categories = Category::orderBy('cat_views','DESC')->limit(3)->get();
        foreach($categories as $cat){
            $cat['questions'] = Question::where('que_cat_id',$cat->id)->count();
        }
        $questions = Question::where('que_cat_id' ,$category->id)->get();
        return view('showcategory', ['category' => $category, 'categories' => $categories, 'questions'=>$questions]);        
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

    public function editCategory(Category $category){
        return view('editcategory', ['category' => $category]);
    }

    public function updateCategory(Category $category, Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        $updated['cat_name']= $request->name;
        $updated['cat_desc']= $request->description;
        $category->update($updated);
        
        return redirect(route('category.show', ['category'=> $category]))->with("success", "Category updated");
    }

    public function deleteCategory(Category $category){
        $category->delete();

        return redirect(route('category.all'))->with("success", "Category deleted successfully");
    }

}
