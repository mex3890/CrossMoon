@extends('layouts.app')

@section('content')
    <div id="post">
        <h1 id="title">{{$post[0]->title}}</h1>
        @foreach($post[0]->contents as $content)
            @if($content->text === null)
                <img style="{{$content->style}}" src="{{$content->path_image}}" alt="sss">
            @else
                <p style="{{$content->style}}">{{$content->text}}</p>
            @endif
        @endforeach
    </div>
@endsection

<style>
    {{$post[0]->style}}
</style>
