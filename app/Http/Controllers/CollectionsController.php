<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Collection;

class CollectionsController extends Controller
{

    public function list()
    {
        return view('collections.list', [
            'collections' => Collection::all()
        ]);
    }

    public function addForm()
    {

        return view('collections.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'film' => 'required',
        ]);

        $collection = new Collection();
        $collection->title = $attributes['title'];
        $collection->film = $attributes['film'];
        $collection->save();

        return redirect('/console/collections/list')
            ->with('message', 'Collection has been added!');
    }

    public function editForm(Collection $collection)
    {
        return view('collections.edit', [
            'collection' => $collection,
        ]);
    }

    public function edit(Collection $collection)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'film' => 'required',
        ]);

        $collection->title = $attributes['title'];
        $collection->film = $attributes['film'];
        $collection->save();

        return redirect('/console/collections/list')
            ->with('message', 'Collection has been edited!');
    }

    public function delete(Collection $collection)
    {
        $collection->delete();
        
        return redirect('/console/collections/list')
            ->with('message', 'Collection has been deleted!');        
    }

    public function imageForm(Collection $collection)
    {
        return view('collections.image', [
            'collection' => $collection,
        ]);
    }

    public function image(Collection $collection)
    {

        $attributes = request()->validate([
            'image' => 'nullable|image',
        ]);

        Storage::delete($collection->image);
        
        $path = request()->file('image')->store('collections');

        $collection->image = $path;
        $collection->save();
        
        return redirect('/console/collections/list')
            ->with('message', 'Collection image has been edited!');
    }
    
}