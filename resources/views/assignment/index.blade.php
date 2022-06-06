@extends('layouts.app')

@section('content')
  <div id="app">
      <div id="table">
          <app-table
            :user-assignments="{{$assignments}}"
            url-assignments="{{route('assignment.index')}}"
            url-create="{{route('assignment.create')}}"
            csrf-token="{{csrf_token()}}">
          </app-table>
      </div>
  </div>
@endsection
