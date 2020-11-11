<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // /Setting Section
    public function profile(){
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }
    public function setting(){

        $user = auth()->user();
        return view('backend.profile.setting', compact('user'));
    }
    public function profile_update(Request $request, $id){
        $this->validate($request,[
            'name' =>'required',
            'email' => 'required|unique:users,email,$id',
        ]);
        $user = User::findOrFail($id);
        if ($user){
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'updated_at' => Carbon::now(),
            ]);
            $user->save();
    }else{
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'updated_at' => Carbon::now(),
        ]);
    }
  }
}
