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
}
