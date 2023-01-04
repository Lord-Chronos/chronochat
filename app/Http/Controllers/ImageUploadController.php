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

        $request->image->move(public_path('images'), $filename);
        Auth()->user()->update(['image'=>$filename]);
        $user = user::findOrFail(Auth()->user()->id);
        $user->image =  $filename;
        $user->save();
        // save uploaded image filename here to your database
        // $request->image->move(public_path('images'), $imageName);
        return back()
            ->with('message','Profile Picture Changed Successfully.')
            ->with('image', $filename); 
    }
}