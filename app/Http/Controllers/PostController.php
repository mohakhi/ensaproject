<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function add_post_form()
    {  
      

        return view('post.create')->with(['categories' => Category::all()]);

      
    }

    public function submit_post_data(Request $request)
    {
       
        $rules = [
            'title' => 'required',
            'description' => 'required',

        ];
  
        $errorMessage = [
            'required' => 'Enter your :attribute first.'
        ];
  
        $this->validate($request, $rules, $errorMessage);
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            $request->file->store('product', 'public');

            $user = auth()->user()->id;

        Post::create([
           'title' => $request->title,
           'description' => $request->description,
           "image_name" => $request->get('image_name'),
           "path" => $request->file->hashName(),
           "category_id" =>$request->category_id,
           "user_id" =>$user,
        ]);

        }
  
        return redirect()->back()->with('success', 'Post Case is successfully saved');
                                
    }


    public function fetch_all_post()
    {
       $posts = Post::toBase()->get();

       return view('post.index',compact('posts'));
                   
    }

    public function view_single_post(Post $post)
    {
        $comments = Comment::toBase()->get();

      return view('post.view',compact('post','comments'));
    }
    public function add_comment(Request $request , Post $post)
    {
        $user = auth()->user()->id;
       


        Comment::create([
            'description' => $request->description,
            'like' =>  $request->like,
            'unlike' =>  $request->unlike,
            "post_id" =>$request->post_id,
            "user_id" =>$user,

         ]);

         return view('post.view',compact('post'));        
        //return view('posts.view')->with('success','Post created successfully.');
    }

}
