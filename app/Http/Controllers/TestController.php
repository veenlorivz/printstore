<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function user(){
        return view('user');
    }

    public function admin(){
        $admin = User::find(Auth::user()->id);
        return view('admin', compact('admin'));
    }

    public function upload($id, Request $request){
        $user = User::find($id);

        $path = $request->profile_pic->store('profile_pic', 'public');
        $user->profile_pic = $path;
        $user->update();
    }
}
