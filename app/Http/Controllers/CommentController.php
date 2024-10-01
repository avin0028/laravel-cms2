<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    
    public function store(Request $request){
    
        $request->validate([
            'content' => ['required','max:128'],
            'post_id' => ['required','exists:posts,id'],
            'parent_id' => ['nullable','exists:comments,id'],
            
        ]);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->user_id = Auth::id();
        $comment->post_id = $request->post_id;
        $comment->parent_id = $request->parent_id;
        $comment->status = 0;
        $comment->save();

         return back()->with('success', "we got your comment. it's under review.");

    }
    public function index(){
        $comments = Comment::with('user')->where('status', 0)->get();
        return view('dashboard.confirmcomments',compact('comments'));
    }
    public function action(Request $request, Comment $comment) 
    {
     

        if($request->action == 'confirm'){
            $comment->status = 1;
            $comment->save();
            return redirect()->route('managecomments')->with('success', 'Comment confirmed successfully.');

        }elseif($request->action == "delete"){
            $comment->delete();
            return redirect()->route('managecomments')->with('success', 'Comment deleted successfully.');


        }else{

            return redirect()->back();
        }
        

    }

}
