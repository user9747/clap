<?php

namespace app\Http\Controllers;
use \App\Post;
use \App\Like;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class PostController extends Controller{

    public function getDashboard(){

        $posts=Post::orderBy('created_at','desc')->get();
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
        if (Auth::user() != $post->user){
          return redirect()->back();
        }
        $post->delete();
        return redirect()->route('dashboard')->with(['message' => 'Successfully Deleted!']);
      }

    public function editPost(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $post=Post::find($request['postId']);
        $post->body=$request['body'];
        $post->update();
        return response()->json(['new_body'=>$post->body],200);
        
    }
    public function postLike(Request $request){
       
        $update=false;
        $postid=$request['postId'];
        $islike=$request['isLike']==='true';
        $post=Post::find($postid);
        if(!$post){
            return null;
        }
        $user=Auth::user();
        $likes=$user->likes()->where('post_id',$postid)->first();
        if($likes){
            $alreadylike=$likes->like;
            $update=true;
            if($alreadylike==$islike){
                $likes->delete();
                return null;
            }
        }else{
            $likes=new Like();
        }
        $likes->like=$islike;
        $likes->user_id=$user->id;
        $likes->post_id=$postid;
        if($update){
            $likes->update();
        }
        else{
            $likes->save();
        }
        return null;
    }    

}



