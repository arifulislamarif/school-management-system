<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebsiteSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $site_settings = WebsiteSettings::get();
        // return $site_settings;
        return view('backend.websiteSettings.index',compact('site_settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WebsiteSettings  $websiteSettings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => "required",
            'email' => "required",
        ]);

        $site_settings =WebsiteSettings::find($id);
        $site_settings->name = $request->name;
        $site_settings->email = $request->email;
        if ($request->has('logo_image')) {
            $this->validate($request, [
                'logo_image' => "required|max:2048",
            ]);
            $image = $request->logo_image;
            $fileName = time().'_'. uniqid() .'.'. $image->getClientOriginalExtension();
            Storage::putFileAs('public/website', $image, $fileName);
            $db_image = 'storage/website/' . $fileName;
            $site_settings->logo_image = $db_image;
        }
        if ($request->has('favicon_image')) {
            $this->validate($request, [
                'favicon_image' => "required|max:2048",
            ]);
            $image = $request->favicon_image;
            $fileName = time().'_'. uniqid() .'.'. $image->getClientOriginalExtension();
            Storage::putFileAs('public/website', $image, $fileName);
            $db_image = 'storage/website/' . $fileName;
            $site_settings->favicon_image = $db_image;
        }
        $site_settings->save();
        session()->flash('success', 'Site Settings Content Updated Successfully!');
        return back();
    }
}
