<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function profile_update(Request $request, User $user){
        $id = Auth::user()->id;
        $this->validate($request, [
            'name' => "required",
            'email' => "required|unique:users,email,$id",
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->has('image')) {
            $image = $request->image;
            $fileName = time().'_'. uniqid() .'.'. $image->getClientOriginalExtension();
            Storage::putFileAs('public/user', $image, $fileName);
            $db_image = 'storage/user/' . $fileName;
            $user->image = $db_image;
        }
        $user->save();
        return back();

    }
}
