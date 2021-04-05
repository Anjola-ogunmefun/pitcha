<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index', ['post'=>auth()->user()->post]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $validated = $request->validate([
            'comment' => ['string','max:1000', 'nullable'],
            'image_url' =>['image', 'max:2500']
        ]);
        post::create([
            'user_id' => auth()->id(),
            'comment' => request('comment'),
            'image_url' => url('storage/' . $request->file('image_url')->store('/uploads/post',  'public')),
            ]);

           $new_post =  auth()->user()->post->latest()->first();

        return view('post.new', ['user_post'=>$new_post]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
     $great = post::all();
     
    //  dd($great->toArray());
     
      return view('post.all',['all_posts'=>$great]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete(); 
        return back()->with(['status' => 'Photo has been deleted successfully']);
        

    }
}
