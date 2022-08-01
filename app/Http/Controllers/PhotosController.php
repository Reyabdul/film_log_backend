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

    public function addForm()
    {

        return view('photos.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);


         //ddd('Add Photo');

        $photo = new Photo();
        $photo->title = $attributes['title'];
        $photo->save();

        return redirect('/console/photos/list')
            ->with('message', 'Photo has been added!');
    }

    public function editForm(Photo $photo)
    {
        return view('photos.edit', [
            'photo' => $photo,
        ]);
    }

    public function edit(Photo $photo)
    {

        $attributes = request()->validate([
            'title' => 'required',
        ]);

        $photo->title = $attributes['title'];
        $photo->save();

        return redirect('/console/photos/list')
            ->with('message', 'Photo has been edited!');
    }
}
