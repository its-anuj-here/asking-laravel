<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedbacks;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::orderBy('cat_views','DESC')->limit(3)->get();
        return view('home', ['categories' => $categories]);
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

        $user = Feedbacks::create($feedback);

        if(!$user){
            return redirect(route('home'))->with("error", "Sending failed!, try again.");
        }
        return redirect(route('home'))->with("success", "Thank you for your valuable feedback");
    }
    public function showTeam(){
        return view('team');
    }
}
