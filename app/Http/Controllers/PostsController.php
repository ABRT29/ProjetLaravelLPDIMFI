<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * create a post
     * Post is a movie or series
     */
    public function createPost(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            ]);

        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->title = $request->post('title');
        $post->content = $request->post('content');

        $post->save();

        return redirect(route('home'));
    }

    public function create(){
        return view('post.add');
    }

    /**
     * Display my published content unless I'm admin it displays all published content
     */
    public function me(Request $request){
        if(Auth::user()->isAdmin == true){
            $list = Post::all();
            return view('home',["list"=>$list]);
        }
        $list = Post::where('user_id', '=', Auth::user()->id)->get();
        return view('home',["list"=>$list]);
    }

    /**
     * Delete a publication by the administrator or by the person who created this content
     */
    public function delete($id){
        if(Auth::user()->isAdmin == true){
            $post = Post::where('id', $id)->delete();
            return redirect(route('home'));
        }else{
            $user_id = Auth::user()->id;
            $post = Post::where('id', $id)->where('user_id','=',$user_id)->delete();
            return redirect(route('home'));
        }
    }





}
