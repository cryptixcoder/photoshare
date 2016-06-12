<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;

class PhotoController extends Controller
{
    public function index(){

    }

    public function show(Photo $photo){
        return view('photos.photo')
                ->withPhoto($photo);
    }

    public function create(){
        return view('photos.create');
    }

    public function store(Request $request){
        $this->validate($request, []);

        $user = $request->user();

        $photo = $request->file('photo');
        $newPhoto = Photo::create($request->all());

        $imageFileName = time() . "." . $photo->getClientOriginalExtension();
        $filepath = $user->id . "/photos/".$imageFileName;
        Storage::disk('s3')->put($filepath, file_get_contents($photo), 'public');

        $newPhoto->filepath = $filepath;
        $newPhoto->user_id = $user->id;
        $newPhoto->save();
    }   

    public function edit(Photo $photo){
        return view('photos.edit')
                ->withPhoto($photo);
    }

    public function update(Request $request, Photo $photo){
        $this->validate($request, [

        ]);
        
        $photo->fill($request->all());
        $photo->save();

        return redirect('/photo/'.$photo->id);
    }

    public function destroy(Request $request, Photo $photo){
    	
    }
}
