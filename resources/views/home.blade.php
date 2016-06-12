@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
           @if($photos->count())

           @else
                <h3 align="center">You aren't following anyone yet.</h3>
           @endif
        </div>
    </div>
</div>
@endsection
