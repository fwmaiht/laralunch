<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LunchRec;
use App\Models\Comment;
use App\Models\Nice;
use Illuminate\Support\Facades\Auth;

class NiceController extends Controller
{
    // public function nice(Comment $comment, Request $request) {
    //     $nice = new Nice();
    //     $nice->comment_id = $comment->id;
    //     $nice->user_id = Auth::id();
    //     // dd($comment, $nice);
    //     $nice->save();
    //     return back();
    // }

    // public function unnice(Comment $comment, Request $request) {
    //     $user = Auth::id();
    //     $nice = Nice::where('comment_id', $comment->id)->where('user_id', $user)->first();
    //     $nice->delete();
    //     return back();
    // }

    // public function store(LunchRec $post) {
    //     $post->users()->attach(Auth::id());
    //     return redirect()->route('lunch.show', ['id' => $post]);
    // }

    // public function destroy(LunchRec $post) {
    //     $post->users()->detach(Auth::id());
    //     return redirect()->route('lunch.show', ['id' => $post]);
    // }

    public function store($id)
    {
        $post = LunchRec::find($id);
        $post->users()->attach(Auth::id());
        $count = $post->users()->count();
        $result = true;
        return response()->json([
            'result' => $result,
            'count' => $count,
        ]);
    }

    public function destroy($id)
    {
        $post = LunchRec::find($id);
        $post->users()->detach(Auth::id());
        $count = $post->users()->count();
        $result = false;
        return response()->json([
            'result' => $result,
            'count' => $count,
        ]);
    }

    public function count ($id)
    {
        $post = LunchRec::find($id);
        $count = $post->users()->count();
        return response()->json($count);
    }

    public function hasnice ($id)
    {
        $post = LunchRec::find($id);
        if ($post->users()->where('user_id', Auth::id())->exists()) {
            $result = true;
        } else {
            $result = false;
        }
        return response()->json($result);
    }
}
