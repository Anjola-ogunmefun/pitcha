<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Friend;
use Illuminate\Http\Request;

class AddFriendController extends Controller
{

    public function search(Request $request){

        $validated = $request->validate([
            'user_name' => ['string','max:1000'],
        ]);

        // Get the search value from the request
        $search = $request->input('search');

        $profiles = Profile::where('user_name', 'LIKE', "%{$search}%")->get();

        return view('friend.index', ['profiles'=>$profiles]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
        $user = auth()->user();

        if(!$user->friends()->exists() || !$user->isFriendsWith($request['friend_id'])) {
            $user->friends()->create([
                'friend_id' => $request['friend_id'],
            ]);
            return back()->with(['status'=>'new friend added']);
        }
        else {
            $user->friends()->firstWhere('friend_id', $request['friend_id'])->delete();

            return back()->with(['status'=>'Friend removed!']);
        }

        return back();

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
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //auth()->user()->friends()->first()->user
        $friend = auth()->user()->friends;
        
        return view('friend.all', ['friends'=>$friend]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Add_friend  $add_friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        //
    }
}
