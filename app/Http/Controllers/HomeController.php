<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Question;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::orderBy('cat_views','DESC')->limit(3)->get();
        foreach($categories as $category){
            $category['questions'] = Question::where('que_cat_id',$category->id)->count();
        }
        $user = User::where('id',1)->first();
        return view('home', ['categories' => $categories, 'user' => $user]);
    }
    public function feedback(Request $request){
        $request->validate([
            'sender' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        $feedback['sender'] = $request->sender;
        $feedback['email'] = $request->email;
        $feedback['message'] = $request->message;

        $user = Feedback::create($feedback);

        if(!$user){
            return redirect(route('home'))->with("error", "Sending failed!, try again.");
        }
        return redirect(route('home'))->with("success", "Thank you for your valuable feedback");
    }
    public function showTeam(){
        $user = User::where('id',1)->first();
        return view('team',['user' => $user]);
    }
}
