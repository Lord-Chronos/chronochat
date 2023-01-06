<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageUploadRequest;
use App\Models\User;
use App\Models\Image;

class ImageUploadController extends Controller
{
    public function index() 
    {
        return view('image-upload.index');
    }

    public function store(ImageUploadRequest $request) 
    {
        $i = new Image;

        $user = User::findOrFail(Auth()->user()->id);

        $name = time() . '.' . $request->image->extension();
        $request->image->move(public_path().'/images/users/', $name);
        $i->url = "users/$name";

        // $user->image_id = $i->id;
        $user->save();
        $user->image()->save($i);

        
        session()->flash('message', 'Profile Picture Changed.');
        return back()
            ->with('message','Profile Picture Changed Successfully.')
            ->with('image', $name); 
    }
}