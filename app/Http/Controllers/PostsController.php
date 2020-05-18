<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Like;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request){
        $list = Post::orderBy('created_at', 'desc')->get();
        return view('welcome',["list"=>$list]);
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

    /**
     * Edit a publication by the administrator or by the person who created this content
     */
    public function editPost(Request $request, $id){
                $post = Post::where('id', $id)->first();

                $post->title = $request->post('title');
                $post->content = $request->post('content');

                $post->save();
                return redirect(route('home'));
    }

    public function edit(Post $id){
        $user = Auth::user()->id;
        $admin = Auth::user()->isAdmin;

        if($user == $id->id || $admin == true){
            $id = ['post' => $id];
            return view('post.edit', $id);
        }else{
            abort(403, 'Unauthorized action.');
        }
    }

    public function postLikePost(Request $request)
       {
           $post_id = $request['postId'];
           $is_like = $request['isLike'] === 'true';
           $update = false;
           $post = Post::find($post_id);
           if (!$post) {
               return null;
           }
           $user = Auth::user();
           $like = $user->likes()->where('post_id', $post_id)->first();
           if ($like) {
               $already_like = $like->like;
               $update = true;
               if ($already_like == $is_like) {
                   $like->delete();
                   return null;
               }
           } else {
               $like = new Like();
           }
           $like->like = $is_like;
           $like->user_id = $user->id;
           $like->post_id = $post->id;
           if ($update) {
               $like->update();
           } else {
               $like->save();
           }
           return null;
       }



}
