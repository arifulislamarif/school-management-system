<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

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
        return view('backend.index');
    }
    public function setting()
    {
        return view('backend.setting');
    }

    //Profile Section ============================
    public function profile()

    {
        $user = auth()->user();
        return view('backend.profile.index', compact('user'));
    }
    public function profile_edit(){
        return view('backend.profile.edit');
    }
    //Profile Section End ===================

    public function users()
    {
        return view('backend.users');
    }
    public function messages()
    {
        return view('backend.meaasages');
    }
}
