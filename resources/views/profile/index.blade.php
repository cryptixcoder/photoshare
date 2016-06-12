@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           <div class="row infoarea">
               <div class="col-md-3">
                   <img src="{{ $user->avatarUrl() }}" alt="" class="img-circle responsive">
               </div>
               <div class="col-md-9">
                   <h3>{{ $user->username }} 
                        @if(Auth::user()->isProfile($user))
                            <a href="/account" class="btn btn-primary">Edit Profile</a>
                        @else
                            <a href="/username/follow" class="btn btn-primary">Follow</a>
                        @endif 
                        <div class="btn-group">
                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-ellipsis-h fa-2x" aria-hidden="true"></i>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a href="/logout">Logout</a></li>
                          </ul>
                        </div>
                    </h3>

                   <p><b>{{ $user->name }}</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem explicabo rem deleniti sequi sapiente officia adipisci error, nam recusandae cumque, eius nobis accusantium amet sed numquam illum quibusdam, cupiditate facere repudiandae quaerat possimus. Similique explicabo, recusandae omnis pariatur, accusamus atque doloribus vero quod accusantium dolorum delectus. Possimus vel asperiores id! <a href="#">www.website.com</a></p>
                   <div class="row">
                       <div class="col-md-3">   
                            {{ $user->photos->count() }} posts
                       </div>
                       <div class="col-md-3">   
                            <a href="/{{ $user->username }}/followers">{{ $user->followers->count() }} followers</a>
                       </div>
                       <div class="col-md-3">   
                            <a href="/{{ $user->username }}/following">{{ $user->following->count() }} following</a>
                       </div>
                   </div>
               </div>
           </div>
           
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                        <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                        <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                        <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                            <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                        <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="">
                        <div class="panel panel-default">
                        <div class="panel-thumbnail">
                                <img src="http://placehold.it/150x150" class="responsive" alt="">
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
