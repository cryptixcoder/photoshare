<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class ProfileController extends Controller
{
	public function index(Request $request){
        return view('account.index')
                ->withUser($request->user());
	}

	public function updateProfile(Request $request){
        $user = $request->user();

        $user->about = $request->about;
        $user->location = $request->location;

        if($request->hasFile('avatar')){

            if($user->avatar){
                Storage::disk('s3')->remove($user->avatar);
            }

            $avatar = $request->file('avatar');

            $imageFileName = time() . "." . $avatar->getClientOriginalExtension();
            
            $filepath = $user->id . "/avatar/".$imageFileName;

            Storage::disk('s3')->put($filepath, file_get_contents($avatar), 'public');

            $user->avatar = $filepath;
        }

        $user->save();

        return back()
                ->withSuccess('Your profile has been updated.');
	}
	
    public function viewProfile($user){

        $user = User::where('username', $user)->firstOrFail();

        return view('profile.index')
                ->withUser($user);
    }

    public function followers(User $user){
        return view('profile.followers')
                ->withUser($user);
    }

    public function following(User $user){
        return view('profile.following')
                ->withUser($user);
    }

    public function follow(User $user){

    }

    public function unfollow(User $user){

    }
}
