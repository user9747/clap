<?php

namespace app\Http\Controllers;
use \App\Post;
use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PostController extends Controller{

    public function getDashboard(){

        $posts=Post::all();
        return view('dashboard',['posts'=>$posts]);

        }

    public function createPost(Request $request){
        $post=new Post();
        $this->validate($request,[
            'body'=>'required|max:1000'
        ]);
        $post->body=$request['body'];
        $message='There was an error';
        if($request->user()->posts()->save($post)){
            $message='Post successfully created';
        }
        return redirect()->route('dashboard')->with(['message'=>$message]);

    }

    public function getDeletePost($post_id)
      {
        $post = Post::where('id',$post_id) ->first();
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted!']);
      }


}
