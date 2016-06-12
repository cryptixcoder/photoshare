<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\Photo;
use Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $photos = Photo::where(function($query){
           if(Auth::user()->following()->count()){
             return $query->where('user_id', $user->id)
                ->orWhere('user_id', $user->following->lists('id'));
           }

           return $query;
        })
        ->orderBy('created_at', 'desc')
        ->get();


        return view('home')
                ->withPhotos($photos);
    }

    public function settings(Request $request){
        return view('account.index')
                ->withUser($request->user());
    }

    public function updateSettings(Request $request){
        $user = $request->user();

        $user->save();

        return back()
                ->withSuccess('Your account information has been updated.');
    }
}
