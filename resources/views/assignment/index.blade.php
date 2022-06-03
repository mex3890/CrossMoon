@extends('layouts.app')

@section('content')
  <div id="app">
      <div id="table">
          <app-table
            :user-assignments="{{$assignments}}"
            url-assignments="{{route('assignment.index')}}"
            csrf-token="{{csrf_token()}}">
          </app-table>
      </div>
  </div>
@endsection
