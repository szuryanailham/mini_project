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
    /**
     * Display a listing of the resource.
     * 
     */

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

        // Decrement the likes_count in posts table
        $post->decrement('likes_count');

        return redirect()->back()->with('success', 'You unliked the post!');
    }

    // Jika user belum like, tambahkan like
    $post->likes()->create(['user_id' => $user->id]);

    // Increment the likes_count in posts table
    $post->increment('likes_count');

    return redirect()->back()->with('success', 'You liked the post!');

    }

    public function detail_post($kode_post)
    {
       // mengambil data post 
    $post = Post::where('kode_post',$kode_post)->first();
    // mengambil comment 
    $comments = $post->comments()->latest()->get();
    // mengambil comment
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
        
        // Simpan komentar ke dalam database
        $newComment = Comment::create([
            'content' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => auth()->id(),
        ]);

        // Redirect ke halaman yang sesuai atau tampilkan pesan sukses
        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    function subComment(Request $request){
        // dd($request);
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

        // Check if the user is already following the other user
        $isFollowing = Follows::where('follower_id', $follower)
                                ->where('followed_id', $id_user)
                                ->exists();


        if (!$isFollowing) {
            Follows::create([
                'follower_id' => $follower->id,
                'followed_id' => $id_user,
            ]);

            // Trigger the event
            $followedUser = User::find($id_user);

            event(new UserFollowed($follower, $followedUser));

            return redirect()->back()->with('success', 'Successfully followed the user.');
        } else {
            return redirect()->back()->with('info', 'You are already following this user.');
        }
    }

}
