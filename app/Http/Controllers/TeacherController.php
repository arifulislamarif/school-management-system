<?php

namespace App\Http\Controllers;

use App\Models\Depertment;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $depertments = Depertment::get();
        return view('backend.teacher.create',compact('depertments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
        $this->validate($request, [
            'name' => "required",
            'email' => "required|unique:users,email",
            'password' => "required|min:8",
            'phone' => "required",
            'depertment_id' => "required",
        ]);

        $teacher = new User();
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        if ($request->has('image')) {
            $this->validate($request, [ 'image' => "image|max:3072",]);
            if(file_exists($teacher->image)){
                @unlink($teacher->image);
            }
            $image = $request->image;
            $fileName = time().'_'. uniqid() .'.'. $image->getClientOriginalExtension();
            Storage::putFileAs('public/teacher', $image, $fileName);
            $db_image = 'storage/teacher/' . $fileName;
            $teacher->image = $db_image;
        }
        if ($request->address) {
            $teacher->address = $request->address;
        }
        $teacher->phone = $request->phone;
        $teacher->depertment_id = $request->depertment_id;
        $teacher->gender = $request->gender;
        $teacher->role = 2;
        $teacher->save();

        // $role = Role::findById(2);
        // $doctor->assignRole($role);

        session()->flash('success', 'Teacher Added Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
