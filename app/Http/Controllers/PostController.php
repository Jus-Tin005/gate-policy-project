<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Post;


class PostController extends Controller
{
    # Method-1
    /*
    public function delete(){
        if(Gate::allows('isAdmin')){
            dd('Admin Allowed');
        }else{
            dd('You are not Admin');
        }
    }
    */

     # Method-2
     /*
        public function delete(){
        if(Gate::denies('isAdmin')){
            dd('You are not Admin');
        }else{  
            dd('Admin Allowed');
        }
    }
     */

     # Method-3
     /*
      public function delete(){
        $this->authorize('isAdmin');
        }
     */

     public function index(){
        $posts = Post::all();
        return view('policy.index',compact('posts'));
     }
     public function show(Post $post){
        return view('policy.show',with('post',$post));
     }

     public function destroy(Post $post){
        $this->authorize('delete',$post);
        $post->delete();
        return redirect()->route('post.index');
     }

}
