<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PageController extends Controller
{
   
    use AuthorizesRequests;

    public function show(String $url){
        $page = Page::where('url',$url)->first();
        if($page->status == 0){
            abort(404);
        }
        return view('showpage',compact('page'));
    }
   public function create(){
    $this->authorize('create', Page::class);
    return view('dashboard.newpage');
   }

    public function showbyUser(){
        $pages = Page::all();
        return view('dashboard.pages',compact('pages'));

    }
    public function edit(Page $page)
    {
        $this->authorize('update', $page);
        return view('dashboard.editpage',compact('page'));
    }
    public function update(Request $request,Page $page){
        $this->authorize('update', $page);
        $request->validate([
            'title' => ['required', 'string', 'max:25'],
            'content' => ['required', 'string', 'max:255'],
            'url'=> ['required','max:20'],
            'status'=>['required'],
        ]);
        $page->update([
            'title' => $request->title,
            'content' => $request->content,
            'url' => $request->url,
            'status' => $request->status,
        ]);
        return redirect()->route('showpagesbyuser');

    }
   
   public function store(Request $request){
    $this->authorize('create', Page::class);

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

    public function destroy(Page $page){
        $this->authorize('delete', $page);
        $page->delete();
        return redirect()->route('showpagebyuser');
    
   }
  
}
