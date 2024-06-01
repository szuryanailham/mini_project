<?php

namespace App\Http\Controllers;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Notification;
use App\Models\User;
use App\Models\Bookmark;
use App\Models\Subcomment;
use App\Models\Comment;
use App\Models\Follows;
use App\Events\UserFollowed;
use Illuminate\Support\Carbon;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
 
     public function __construct()
     {
         $this->middleware('auth');
     }
    public function addBookmark($kode_post)
    {
        $post = Post::where('kode_post', $kode_post)->first();
        $user = auth()->id();
        Bookmark::insert([
            'user_id' => $user,
            'post_id' => $post->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return redirect('/home')->with('success', 'bookmark berhasil disimpan.');
    }

    public function likePost($kode_post)
    {
      $post = Post::where('kode_post', $kode_post)->first();
      $user = Auth::user();
      if (!$post) {
        return redirect()->back()->with('error', 'Post not found.');
    }
    if ($post->likes()->where('user_id', $user->id)->exists()) {
        $post->likes()->where('user_id', $user->id)->delete();

        $post->decrement('likes_count');

        return redirect()->back()->with('success', 'You unliked the post!');
    }

    $post->likes()->create(['user_id' => $user->id]);

    $post->increment('likes_count');

    return redirect()->back()->with('success', 'You liked the post!');

    }

    public function detail_post($kode_post)
    { 
    $post = Post::where('kode_post',$kode_post)->first();
 
    $comments = $post->comments()->latest()->get();

    return view('Comment',[
       'post'=>$post,
       'comment' => $comments 
    ]);
    }

    public function addComment(Request $request){
        $validatedData = $request->validate([
            'comment' => 'required|string',
            'post_id' => 'required|integer',
        ]);
        

        $newComment = Comment::create([
            'content' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    function subComment(Request $request){
  
         $request->validate([
            'sub_comment' => 'required|string',
            'comment_id' => 'required|integer',
        ]);

        Subcomment::create([
            'content' => $request->sub_comment,
            'comment_id' => $request->comment_id,
            'user_id' => auth()->id(),
        ]);
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    function followUp($id_user){
        $follower = Auth::user();

        $isFollowing = Follows::where('follower_id', $follower)
                                ->where('followed_id', $id_user)
                                ->exists();


        if (!$isFollowing) {
            Follows::create([
                'follower_id' => $follower->id,
                'followed_id' => $id_user,
            ]);

            
            $followedUser = User::find($id_user);

            event(new UserFollowed($follower, $followedUser));

            return redirect()->back()->with('success', 'Successfully followed the user.');
        } else {
            return redirect()->back()->with('info', 'You are already following this user.');
        }
    }

    public function notification()
    {
        $user_id = Auth::id();
        $notifications = Notification::where('user_id', $user_id)->get();

        return view('Notifikasi', [
            'title' => 'Your Notifications',
            'notifications' => $notifications,
        ]);
    }

    public function following()
    {
        $currentUserId = Auth::id();
    
      
        $followedUserIds = Follows::where('followed_id', $currentUserId)->pluck('followed_id');
    
      
        $posts = Post::whereIn('user_id', $followedUserIds)->latest()->get();

        $currentUserId = Auth::id();
        $followedUserIds = Follows::where('follower_id', $currentUserId)->pluck('followed_id')->toArray();
        $users = User::whereNotIn('id', $followedUserIds)
                     ->where('id', '!=', $currentUserId)
                     ->take(3)
                     ->get();

        return view('home2', [
            'title' => 'Your Followed Users Posts',
            'posts' => $posts,
            'recommend' => $users
        ]);
    }

    public function aploud_profile(Request $request){
        dd($request);
    }

}
