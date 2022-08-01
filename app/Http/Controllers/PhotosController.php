<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotosController extends Controller
{


    public function list()
    {
        return view('photos.list', [
            'photos' =>Photo::all()
        ]);
    }

    public function delete(Photo $photo)
    {
        //debugging function: displays info
            //ddd($photo);

        $photo->delete();
        
        //handles delete and adds message
        return redirect('/console/photos/list')
            ->with('message', 'Photo has been deleted!');        
    }
}
