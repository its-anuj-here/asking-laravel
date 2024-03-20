<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory(){
        $categories = Category::all();
        foreach($categories as $category){
            $category['questions'] = Question::where('que_cat_id',$category->id)->count();
        }
        $user = User::where('id',1)->first();
        return view('allcategory', ["categories"=>$categories, 'user' => $user]);
    }

    public function showCategory(Category $category){
        if(parse_url(url()->previous(), PHP_URL_PATH) != "/category/".$category->id."/show"){
            $inc['cat_views'] = ((int) $category->cat_views) + 1;
            $category->update($inc);
        }
        $categories = Category::orderBy('cat_views','DESC')->limit(3)->get();
        foreach($categories as $cat){
            $cat['questions'] = Question::where('que_cat_id',$cat->id)->count();
        }
        $questions = Question::where('que_cat_id' ,$category->id)->get();
        foreach($questions as $question){
            $user = User::where('id',$question->user_id)->first();
            $question['by_username'] = $user->username;
            $d=strtotime($question->updated_at);
            $question['posted_at']=date("l, h:i:sa Y-m-d", $d);
        }
        $user = User::where('id',1)->first();
        return view('showcategory', ['category' => $category, 'categories' => $categories, 'questions'=>$questions, 'user' => $user]);
    }

    public function addCategory(){
        $user = User::where('id',1)->first();
        return view('addcategory', ['user' => $user]);
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
        $user = User::where('id',1)->first();
        return view('editcategory', ['category' => $category, 'user' => $user]);
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
