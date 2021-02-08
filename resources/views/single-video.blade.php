
@extends('layouts.welcome')

@section('content')

<div class="row">
    <div class="col-12 card">
            <div class="card-body mx-auto text-center">
                @if ($video[0]->website === 'youtube')

     <iframe width="500" height="400" src="https://www.youtube.com/embed/{{$video[0]->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
     @else
     <div width="500" height="400" class="fb-video" data-href="{{$video[0]->link}}"  data-lazy="true" data-show-text="false">
    </div>
     @endif
                <h3 class="mt-3">
                    {{$video[0]->title}}
                </h3>
            </div>

    </div>

</div>


@endsection
