
@extends('layouts.welcome')

@section('content')
<div class="row mb-5">
    <div class="col-6 offset-3">
        <h3 class="text-center">You are logged in</h3>
        <div class="card py-4">
            <div class="card-header text-center">
                <h2 class="bg-success py-4 text-light">Put your favourite videos all together.</h2>
            </div>
            <div class="card-body">
<div class="row">
    <div class="col-6 d-grid">
<a class="btn btn-danger" href="{{route('youtube')}}">Youtube</a>
    </div>
    <div class="col-6 d-grid">
 <a class="btn btn-primary" href="{{route('facebook')}}">Facebook</a>
    </div>
</div>
            </div>

        </div>
    </div>
</div>
{{--```````````````````` Videos ```````````` --}}
@if ( count($videos))
<div class="card mt-5">
    <div class="card-header">
        <h3 class="text-center">
            Your all favourite  videos
        </h3>
        @if (Session::has('deleted'))
        <div class="alert alert-danger text-center">
            <strong>{{Session::get('deleted')}}</strong>
        </div>
        @endif
    </div>
    <div class="card-body">
        <div class="row">
@foreach ($videos as $video)
<div class="col-lg-4 my-2 text-center card">
    @if ($video->website === 'youtube')
    <div class="card-body">
        <iframe width="auto" height="250" src="https://www.youtube.com/embed/{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3>
            {{$video->title}}
        </h3>
        <div class="row">
            <div class="col-5 offset-1">
                <div class="d-grid">
                    <a href="{{route('youtube.destroy',$video->id)}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <div class="col-5 ">
                <div class="d-grid">
                    <button class="btn btn-primary tooltipa" onclick="copyLink('{{Request::root()}}/single-video/{{$video->key}}',{{$video->id}});">Copy Link
                        <span id='tool-id-{{$video->id}}'  class="tooltiptexta">Copied</span>
                      </button>
                </div>
            </div>

        </div>
    </div>
   @elseif($video->website === 'facebook')
   <div class="card-body">
    <div width="auto" height="245" class="fb-video" data-href="{{$video->link}}"  data-lazy="true" data-show-text="false">
    </div>
  <div class="d-grid gap-2">
      <h3>
          {{$video->title}}
      </h3>
      <div class="row">
        <div class="col-5 offset-1">
            <div class="d-grid">
                <a href="{{route('facebook.destroy',$video->id)}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
        <div class="col-5 ">
            <div class="d-grid">
                <button class="btn btn-primary tooltipa" onclick="copyLink('{{Request::root()}}/single-video/{{$video->key}}',{{$video->id}});">Copy Link
                    <span id='tool-id-{{$video->id}}'  class="tooltiptexta">Copied</span>
                  </button>
            </div>
        </div>
    </div>
  </div>
</div>
    @endif




</div>
@endforeach
        </div>
        <div class="row">
            <div class="col-6 offset-3">
                <div>
                    {{$videos->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endif



@endsection
<style>
    h2{
        clip-path: polygon(10% 0, 100% 0, 90% 90%, 0 100%);
    }

</style>

