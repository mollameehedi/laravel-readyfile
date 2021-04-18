<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\User;
use Auth;
use Hash;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function profilenamechange(Request $request){
        User::find(Auth::id())->update([
            'name' => $request->name
        ]);
        return back()->with('name_change_status','Name Change succesfuly');
    }
    public function profilephotopost(Request $request){
        $request->validate([
            'profile_photo' => 'required|image',
        ]);
        if ($request->hasFile('profile_photo')) {
            if(Auth::user()->profile_photo != 'default.png'){
               $old_photo_location = 'public/uploads/profile/'.Auth::user()->profile_photo;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('profile_photo');
            $new_photo_name = Auth::id().".".$uploaded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/uploads/profile/'.$new_photo_name;
           Image::make($uploaded_photo)->save(base_path($new_photo_location));
           User::find(Auth::id())->update([
              'profile_photo' =>  $new_photo_name,
           ]);
           return back()->with('profile_photo_status','Profile photo change successfuly');
        } else {
            return back()->withErrors('No file was uploaded');
        }
        
    }
    public function profilepasswordpost(Request $request){
        $request->validate([
            'password' => 'confirmed|min:8',
        ]);
        if (Hash::check($request->old_password, Auth::User()->password)) {
            if($request->old_password != $request->password){
                User::find(Auth::id())->update([
                    'password' => Hash::make($request->password)
                ]);
                return back()->with('password_change_status', 'Password Changed Successfuly');
            }
            else{
                return back()->withErrors('The Old Password cannot be Again');
            }
        }
        else{
           return back()->withErrors('Your Old Password is Wrong');
        }
    }
}
