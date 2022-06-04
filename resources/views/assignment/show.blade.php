@extends('layouts.app')

@section('content')
    <div id="app">
        <div id="table">
            <app-table-show :assignment="{{$assignment}}">

            </app-table-show>
        </div>
    </div>
@endsection
