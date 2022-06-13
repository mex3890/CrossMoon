@extends('layouts.app')

@section('content')
    <div id="app">
        <div id="table">
            <div id="content-table">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <th>ID</th>
                        <td>{{ $assignment->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $assignment->name }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $assignment->description }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span
                                class="{{$assignment->stat->name === 'Finished' ? 'finish' : ''}}{{$assignment->stat->name === 'In progress' ? 'inprogress' : ''}}{{$assignment->stat->name === 'Created' ? 'created' : ''}}">
                                {{ $assignment->stat->name }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>{{ $assignment->category->name }}</td>
                    </tr>
                    </tbody>
                </table>
                <div id="show-content-buttons">
                    <a href="{{route('assignment.index')}}" class="btn btn-secondary">Return</a>
                    <a href="#" class="btn btn-secondary">Update</a>
                </div>
            </div>
        </div>
    </div>
@endsection
