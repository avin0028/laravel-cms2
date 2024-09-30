<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $categories = Category::all();
        return view('dashboard.categories',compact('categories'));
    }
    public function create(Request $request){
        $categories = Category::all();
        return view('dashboard.newcategory',compact('categories'));
      }
      public function store(Request $request)
      {
        //  if($request->delete){
        //    $request->validate(['delete'=> ['required','max:25','string']]);
     
        //    Category::where('name',$request->delete)->delete();
        // }else{
           $request->validate(['name'=> ['required','max:25','string']]);
        $category = new Category();
        $category->name = $request->name;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->route('dashboard.categories');
      }
      public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();
    
        return redirect()->route('dashboard.categories');
    
      }
}
