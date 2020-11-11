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
}
