
@extends('layouts.welcome')

@section('content')
<div class="row">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
        <h3 class="text-center">Add Youtube Video</h3>
        @if (Session::has('inserted'))
        <div class="alert alert-success text-center">
            <strong>{{Session::get('inserted')}}</strong>
        </div>
        @endif

            </div>
            <div class="card-body">
        <form action="{{route('youtube.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="link">URL</label>
              <input required type="text" name="link" id="link" class="form-control" placeholder="Type your youtube video link" >
            </div>
            <div class="form-group">
                <label for="title">Title</label>
                <input required type="text" name="title" id="title" class="form-control" placeholder="Give a title" >
              </div>
              <div class="d-grid mt-2">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
              </div>

        </form>
            </div>
        </div>
    </div>
</div>
{{--@@@@@@@@@@@@@@@@@@@@ Videos @@@@@@@@@@@@@@@@@@@@@ --}}

    <div class="card">
        <div class="card-header">
            <h3 class="text-center">
                Your favourite youtube videos
            </h3>
            @if (Session::has('deleted'))
            <div class="alert alert-danger text-center">
                <strong>{{Session::get('deleted')}}</strong>
            </div>
            @endif
        </div>
        <div class="card-body">
            <div class="row">
@foreach ($youtubes as $youtube)
<div class="col-lg-4 my-2 text-center card">
    <div class="card-body">
        <iframe style="width:100%;height:100%;" src="https://www.youtube.com/embed/{{$youtube->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        <h3>
            {{$youtube->title}}
        </h3>
        <div class="row">
            <div class="col-5 offset-1">
                <div class="d-grid">
                    <a href="{{route('youtube.destroy',$youtube->id)}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <div class="col-5 ">
                <div class="d-grid">
                    <button class="btn btn-primary tooltipa" onclick="copyLink('{{Request::root()}}/single-video/{{$youtube->key}}',{{$youtube->id}});">Copy Link
                        <span id='tool-id-{{$youtube->id}}'  class="tooltiptexta">Copied</span>
                      </button>
                </div>
            </div>

        </div>
    </div>



</div>
@endforeach
            </div>
            <div class="row">
                <div class="col-6 offset-3">
                    <div>
                        {{$youtubes->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
