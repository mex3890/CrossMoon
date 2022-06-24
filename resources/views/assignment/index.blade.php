@extends('layouts.app')
<link href="{{ asset('css/assignment.css') }}" rel="stylesheet">
@section('content')
    <div id="content">
        <div id="box">
            @foreach($assignments as $assignment)
                <div class="card text-center">
                    <div class="card-header">
                        <span class="{{$assignment->stat->name === 'Finished' ? 'finish' : ''}}{{$assignment->stat->name === 'In progress' ? 'inprogress' : ''}}
                        {{$assignment->stat->name === 'Created' ? 'created' : ''}} {{($assignment->validity < now() && $assignment->stat->name !== 'Finished') ? 'expired' : ''}}">
                        {{($assignment->validity < now() && $assignment->stat->name !== 'Finished') ? 'Expired' : $assignment->stat->name}}</span>
                    </div>
                    <div class="card-header card-expired">
                        <p class="card-text">{{$assignment->validity}}</p>
                    </div>
                    <div class="card-body text-muted">
                        <h5 class="card-title">{{$assignment->category->name}}</h5>
                        <p class="card-text">{{$assignment->name}}</p>
                    </div>
                    <div class="card-footer text-muted">
                        <a href="{{route('assignment.show', ['assignment' => $assignment])}}"><i class='bx bxs-show'></i></a>
                        <a href="#" class="btn btn-primary"><i class='bx bxs-edit'></i></a>
                        <form class="btn btn-primary" method="POST" action="{{route('assignment.destroy', ['assignment' => $assignment])}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit"><i class='bx bx-trash'></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
