<?php

namespace App\Http\Controllers;
use DB;

use App\Models\post;
use App\Models\Like;

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
            'image_url' =>['image', 'max:2500', 'required']
        ]);

        if(!$request['image_url']){

            return back()->with(['status'=>'No file selected']);
        }

        post::create([
            'user_id' => auth()->id(),
            'comment' => $request['comment'],
            'image_url' => url('storage/' . $request->file('image_url')->store('/uploads/post',  'public')),
            ]);

            $new_post =  auth()->user()->posts->last();
        return back()->with(['status' => "Your photo was uploaded successfully!"]);

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
    public function show()
    {

         $all_posts =  auth()->user()->posts;

      return view('post.all',['all_posts'=>$all_posts]);

    }

    public function fetchLike(Request $request)
    {
        
        $post = post::find($request->post);
        return response()->json([
            'post' => $post,
        ]);
    }
 
    public function handleLike(Request $request)
    {
        $post = post::find($request->post);
        $value = $post->like;
        $post->like = $value+1;
        $post->save(); 
               
    }    
 
    public function fetchDislike(Request $request)
    {
        $post = post::find($request->post);
        return response()->json([
            'post' => $post,
        ]);
    }
 
    public function handleDislike(Request $request)
    {
        $post = post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();
        return response()->json([
            'message' => 'Disliked',
        ]);
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
    public function destroy(post $id)
    {        
        $id->delete();
        return back()->with(['status' => 'Photo has been deleted successfully']);   

    }
}
