@extends('layouts.app')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<link href="{{ asset('css/assignment.css') }}" rel="stylesheet">
@section('content')
    <div id="app">
        <div id="table">
            <div id="content-table">
                <div class="header-table">
                    <h4>Assignments</h4>
                    <a href="{{route('assignment.create')}}" class="btn btn-primary assignment-button">Create
                        Assignment</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Status</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Validity</th>
                        <th colspan="3">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="assignments-table">
                    @foreach($assignments as $assignment)
                        <tr>
                            <td>{{ $assignment->id }}</td>
                            <td>
                                <span class="{{$assignment->stat->name === 'Finished' ? 'finish' : ''}}{{$assignment->stat->name === 'In progress' ? 'inprogress' : ''}}
                                {{$assignment->stat->name === 'Created' ? 'created' : ''}} {{($assignment->validity < now() && $assignment->stat->name !== 'Finished') ? 'expired' : ''}}">
                                    {{($assignment->validity < now() && $assignment->stat->name !== 'Finished') ? 'Expired' : $assignment->stat->name}}
                                </span>
                            </td>
                            <td id="name">{{ $assignment->name }}</td>
                            <td>{{ $assignment->category->name }}</td>
                            <td><span class={{($assignment->validity < now() && $assignment->stat->name !== 'Finished') ? 'expired' : ''}}>{{ $assignment->validity }}</span></td>
                            <td class="action"><a href="{{route('assignment.show', ['assignment' => $assignment])}}"><i
                                        style="color: #21c267;" class='bx bxs-show'></i></a>
                            </td>
                            <td class="action"><a href="#"><i style="color: #000000;" class='bx bxs-edit'></i></a></td>
                            <td class="action">
                                <form method="POST" action="{{route('assignment.destroy', ['assignment' => $assignment])}}">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit"><i style="color: #ff3c3c;" class='bx bx-trash'></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
