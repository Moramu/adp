<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class ImageUploadController extends Controller

{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUpload()
    {
        return view('imageUpload');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function imageUploadPost()
    {
//You don't need else since you return.
Session::flash('error_message','');
        request()->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);
        return back()
            ->with('success','You have successfully upload image.')
            ->with('photo',$imageName);
    }
}