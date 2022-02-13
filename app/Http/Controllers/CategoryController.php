<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //

    
    public function add_category_form()
    {  
      

        return view('category.create');

      
    }

    public function submit_category_data(Request $request)
    {
      $rules = [
          'name' => 'required',
      ];

      $errorMessage = [
          'required' => 'Enter your :attribute first.'
      ];

      $this->validate($request, $rules, $errorMessage);
      
      Category::create([
         'name' => $request->name,
      ]);

      //$this->message('message','Category created successfully!');
      return redirect()->back()->with('success', 'category Case is successfully saved');;

    }

    public function fetch_all_category()
    {
       $Categories = Category::toBase()->get();
       return view('Category.index',compact('Categories'));
    }

    public function chart_category() {
      

    $viewer = Category::select(DB::raw("count(id) as count"))  
        ->orderBy("created_at")  
        ->groupBy(DB::raw("day(created_at)"))  
        ->get()->toArray();  
    $viewer = array_column($viewer, 'count');  

    

    

    return view('chart.google-bar-chart')  
            ->with('viewer',json_encode($viewer,JSON_NUMERIC_CHECK))  ;

    }

    public function chart_posts() {
    
 
     $viewer1 = Post::select(DB::raw("count(category_id) as count"))  
         ->orderBy("created_at")  
         ->groupBy(DB::raw("day(created_at)"))  
         ->get()->toArray();  
     $viewer1 = array_column($viewer1, 'count');  
 

     $view_user = Post::select(DB::raw("count(user_id) as count"))  
         ->orderBy("created_at")  
         ->groupBy(DB::raw("day(created_at)"))  
         ->get()->toArray();  
     $view_user = array_column($view_user, 'count');  
 
     
 
     return view('chart.google-bar-chart-post')  
             ->with('viewer1',json_encode($viewer1,JSON_NUMERIC_CHECK))  
             ->with('view_user',json_encode($view_user,JSON_NUMERIC_CHECK));  

     }
}
