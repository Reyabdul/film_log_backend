<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Collection;
use App\Models\User;
use App\Models\Photo;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/collections', function(){

    $collections = Collection::orderBy('title')->get();
    return $collections;

});

Route::get('/photos', function(){

    $photos = Photo::orderBy('created_at')->get();

    foreach($photos as $key => $photo)
    {
        $photos[$key]['user'] = User::where('id', $photo['user_id'])->first();
        $photos[$key]['collection'] = Collection::where('id', $photo['collection_id'])->first();

        if($photo['image'])
        {
            $photos[$key]['image'] = env('APP_URL').'storage/'.$photo['image'];
        }
    }

    return $photos;

});

Route::get('/photos/profile/{photo?}', function(Photo $photo){

    $photo['user'] = User::where('id', $photo['user_id'])->first();
    $photos['colelction'] = Collection::where('id', $photo['collection_id'])->first();

    if($photo['image'])
    {
        $photo['image'] = env('APP_URL').'storage/'.$photo['image'];
    }

    return $photo;

});
