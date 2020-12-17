<?php

namespace App\Http\Controllers;

use App\Models\Depertment;
use Illuminate\Http\Request;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depertments = Depertment::get();
        return view('backend.depertment.index',compact('depertments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.depertment.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|unique:depertments,name",
        ]);

        $depertment = new Depertment();
        $depertment->name = $request->name;
        $depertment->save();

        session()->flash('success', 'Depertment Added Successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function show(Depertment $depertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depertment $depertment)
    {
        $depertment = Depertment::findOrFail($depertment->id);
        return view('backend.depertment.edit',compact('depertment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Depertment $depertment)
    {
        $this->validate($request, [
            'name' => "required|unique:depertments,name,$depertment->id",
        ]);

        $depertment = new Depertment();
        $depertment->name = $request->name;
        $depertment->save();

        session()->flash('success', 'Depertment Updated Successfully');
        return redirect(route('depertment.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depertment $depertment)
    {
        if($depertment){
            $depertment->delete();
        }

        session()->flash('success', 'Depertment Deleted Successfully!');
        return back();
    }
}
