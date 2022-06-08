@extends('layouts.app')

@section('content')
    <div id="app">
        <app-create-form
            :stats="{{$stats}}"
            :categories="{{$categories}}"
        ></app-create-form>
    </div>
@endsection
