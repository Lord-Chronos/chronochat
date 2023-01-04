<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use App\Models\User;

class ImageUploadController extends Controller
{
    public function index() 
    {
        return view('image-upload.index');
    }

    public function store(ImageUploadRequest $request) 
    {
        $filename = time() . '.' . $request->image->extension();
        $user = user::findOrFail(Auth()->user()->id);

        $request->image->move(public_path().'/images/users/', $filename);
        $user->image =  $filename;
        $user->save();

        session()->flash('message', 'Profile Picture Changed.');
        return back()
            ->with('message','Profile Picture Changed Successfully.')
            ->with('image', $filename); 
    }
}