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

        return view('profile.index', ['profile'=>auth()->user()->profile]);
    }


    /**
     * Show the form for editing user profile.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('profile.edit', ['profile'=>auth()->user()->profile]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
 
        $validated = $request->validate([
            'user_name' => ['string','max:255' ,'nullable',],
            'gender' => ['string', 'nullable'],
            'description' => ['string','max:255', 'nullable'],
            'phone_number' => ['string','max:255', 'nullable'],
            'D_O_B' => ['date', 'nullable'],
            'occupation' => ['string','max:40', 'nullable'],
            'nationality' => ['string','max:15', 'nullable'],
            'image_url' =>['image', 'max:2500', 'nullable']
        ]);

        $form_value = [
            'user_id' => auth()->id(),
            'user_name' => request('user_name'),
            'gender' => request('gender'),
            'description' => request('description'),
            'phone_number' => request('phone_number'),
            'D_O_B' => request('D_O_B'),
            'occupation' => request('occupation'),
            'nationality' => request('nationality'),
            ];
            
            if($request->hasFile('image_url')){
                $form_value = array_merge($form_value, ['image_url' => url('storage/' . $request->file('image_url')->store('/uploads/profile_image',  'public'))
                ]);
            }      
            
            
            auth()->user()->profile->update($form_value);

         return back()->with(['status' => 'Profile has been updated successfully']);

    }
}
