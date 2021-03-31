<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
 
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = auth()->user();

        return view('profile.index');
    }


    /**
     * Show the form for editing user profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('profile.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        // $request = [];
        // $info = [] ;
        // info->user_name = document.getElementById('user_name').value;
        // info->gender = document.getElementById('last_name').value;
        // $request->push(info);

        $request = 

        $validated = $request->validate([
            'user_name' => ['string','max:255'],
            'gender' => ['string', 'min:4', 'max:6'],
            'description' => ['mediumText','max:255'],
            'phone_number' => ['string','max:255'],
            'D.O.B' => ['date'],
            'occupation' => ['string','max:40'],
            'nationality' => ['string','max:15'],
        ]);


        
        return back()->view('profile.edit')->withInput();

    }










//  /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Profile  $profile
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Profile $profile)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Profile  $profile
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Profile $profile)
    // {
    //     //
    // }

}
