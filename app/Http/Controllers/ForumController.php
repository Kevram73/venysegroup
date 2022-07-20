<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;

class ForumController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $posts = Post::all();
        //   bv
        $publicateur = User::find();
        return view('venyse/forum',['user'=>$user,'posts'=>$posts]);
    }

    public function create(Request $request)
    {
        $rules = [
            'message' => 'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails())
        {
            return redirect();
        }else{
            $post = new Post;
            $user_id = Auth::user()->id;
            $post->message = $request->message;
            $post->user_id = $user_id ;
            $post->save();
            return redirect('forum');
        }
    }


}
