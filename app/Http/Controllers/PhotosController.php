<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Photo;
use App\Models\Collection;

class PhotosController extends Controller
{

    public function list()
    {
        return view('photos.list', [
            'photos' => Photo::all()
        ]);
    }

    public function addForm()
    {
        return view('photos.add', [
            'photos' => Collection::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'iso' => 'required',
            'av' => 'required',
            'ss' => 'required',
            'note' => 'nullable',
            'collection_id' => 'required',
        ]);

        $photo = new Photo();
        $photo->title = $attributes['title'];
        $photo->iso = $attributes['iso'];
        $photo->av = $attributes['av'];
        $photo->ss = $attributes['ss'];
        $photo->notes = $attributes['notes'];
        $photo->collection_id = $attributes['collection_id'];
        $photo->user_id = Auth::user()->id;
        $photo->save();

        return redirect('/console/photos/list')
            ->with('message', 'Photo has been added!');
    }

    public function editForm(Photo $photo)
    {
        return view('photos.edit', [
            'photo' => $photo,
            'collections' => Collection::all(),
        ]);
    }

    public function edit(Photo $photo)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'iso' => 'required',
            'av' => 'required',
            'ss' => 'required',
            'note' => 'nullable',
            'collection_id' => 'required',
        ]);

        $photo->title = $attributes['title'];
        $photo->iso = $attributes['iso'];
        $photo->av = $attributes['av'];
        $photo->ss = $attributes['ss'];
        $photo->note = $attributes['note'];
        $photo->collection_id = $attributes['collection_id'];
        $photo->save();

        return redirect('/console/photos/list')
            ->with('message', 'Photo has been edited!');
    }

    public function delete(Photo $photo)
    {
        $photo->delete();
        
        return redirect('/console/photos/list')
            ->with('message', 'Photo has been deleted!');        
    }

    public function imageForm(Photo $photo)
    {
        return view('photos.image', [
            'photo' => $photo,
        ]);
    }

    public function image(Photo $photo)
    {

        $attributes = request()->validate([
            'image' => 'required|image',
        ]);

        Storage::delete($photo->image);
        
        $path = request()->file('image')->store('photos');

        $photo->image = $path;
        $photo->save();
        
        return redirect('/console/photos/list')
            ->with('message', 'Photo image has been edited!');
    }
    
}