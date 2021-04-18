<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.home.home',[
            'users' => User::all(),
        ]);
    }
    public function userdelete($id){

        if(User::find($id)->profile_photo != 'default.png'){
            $old_photo_location = 'public/uploads/profile/'.User::find($id)->profile_photo;
             unlink(base_path($old_photo_location));
         }
        User::find($id)->delete();
        return back()->with('user_delete_status', 'User Deleted successfuly');
    }
}
