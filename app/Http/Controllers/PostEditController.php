<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostEditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
// Anda bisa mengakses pengguna yang menulis post tersebut
// $user = $post->user;
        return view("home", [
            'posts' => $posts
        ]);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'judul'=> 'required|max:255',
            'image'=>'image|file|max:2000',
            'deskripsi' => 'required'
        ]);     
        $randomNumber = str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT);
        $randomString = Str::random(5);
        $validatedData['user_id']=auth()->user()->id;  
        $validatedData['kode_post'] = 'post-' . $randomNumber . '-' . $randomString;  
        $validatedData['image'] = $request->file('image')->store('post-images');       
        Post::create($validatedData);
        return redirect('/home')->with('success','News has been add');                                                                                                                                                                                                                                                                                                                                                                         
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        
        if (empty($search)) {
            // Jika tidak ada input pencarian, ambil 3 data teratas
            $users = User::take(2)->get();
        } else {
            // Jika ada input pencarian, ambil data berdasarkan pencarian
            $users = User::where('name', 'like', '%' . $search . '%')->get();
        }
    
        return view('Search', [
            'results' => $users,
            'title' => "daya"
        ]);
    }
    
}
