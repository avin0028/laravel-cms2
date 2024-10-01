<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function show(String $url){
        $page = Page::where('url',$url)->first();
        return view('showpage',compact('page'));
    }
   public function create(){
    return view('dashboard.newpage');
   }
   public function store(Request $request){
    $request->validate([
        'title' => ['required', 'string', 'max:25'],
        'content' => ['required', 'string', 'max:255'],
        'url'=> ['required','max:20'],
        'status'=>['required'],
    ]);
    $page = new Page();
    $page->author = Auth::id();
    $page->title = $request->title;
    $page->content = $request->content;
    $page->url = $request->url;
    $page->status = $request->status;
    $page->save();
    return redirect()->route('showpage',$request->url);
    

   }
   public function showbyuser(){
    return "test";
   }
}
