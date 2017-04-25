<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use Illuminate\Support\MessageBag;

class PostController extends Controller
{
	// public function __construct()
 //    {
 //        $this->middleware('user');
 //    }
    public function create(){
    	if(Auth::check()){
            $slugs = Post::pluck('slug');
    		return view('post/create')->with(compact('slugs'));
    	}
    	return redirect('login');	
    }

    public function store(Request $request){
        //create with eloquent in laravel
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->slug = $request->input('slug');
        $post->user_id = Auth::user()->id;
        $post->save();

        return redirect('/');
    	
    }
    public function edit($id){
        $post = Post::find($id);
        $slugs = DB::table('posts')->pluck('slug');
        return view('post.edit', compact('post', 'slugs'));
    }

    public function update($id = null, Request $request){
        $slugs = Post::where('id', '!=', $id)->pluck('slug');
        $slugs = json_decode(json_encode($slugs), true);
        if($id == null){
            return redirect()->back();
        }else{
            $post = Post::find($id);
            if(in_array($request->input('slug'), $slugs)){
                $errors = new MessageBag(['errorSlug' => 'Slug bị trùng! Bạn hãy nhập lại Slug mới!']);
                return redirect()->back()->withErrors($errors)->withInput();
            }else {
                $post->title = $request->input('title');
                $post->content = $request->input('content');
                $post->slug = $request->input('slug');
                $post->save();
                return redirect()->back();
            }
        }    
    }

    public function delete($id = null){
        if($id == null){
            return redirect()->back();
        }else{
            $post = Post::find($id);
            $post->delete_flg = 1;
            $post->delete_at = date('y-m-d H:i:s');
            $post->delete_by = Auth::user()->id;
            $post->save();
            return redirect()->back();
        }
    }

    public function view($id = null){
        if($id == null){
            return redirect()->back();
        }else{
            $post = Post::find($id);
            if($post->delete_flg == 1){
                return view('errors.404');
            }else{
                return view('post.view', compact('post'));
            }
        }
    }
}
