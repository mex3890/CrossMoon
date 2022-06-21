@extends('layouts.app')
<link href="{{ asset('css/table.css') }}" rel="stylesheet">
<link href="{{ asset('css/assignment.css') }}" rel="stylesheet">
@section('content')
    <div class="form-assignment">
        <form method="POST" action="{{route('assignment.store')}}">
            @csrf
            <h3>Create Assignment</h3>
            <div class="mb-3">
                <label class="form-label">Name</label>
                @if($errors->has('name'))
                    <input type="text" class="form-control is-invalid" name="name"
                           value="{{$assignment->name ?? old('name')}}">
                    <span class="invalid-feedback">{{$errors->first('name')}}</span>
                @elseif(old('name') && !($errors->has('name')))
                    <input type="text" class="form-control is-valid" name="name"
                           value="{{$assignment->name ?? old('name')}}">
                @else
                    <input type="text" class="form-control" name="name" value="{{$assignment->name ?? old('name')}}">
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                @if($errors->has('description'))
                    <textarea class="form-control is-invalid" name="description"
                              id="description">{{$assignment->description ?? old('description')}}</textarea>
                    <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @elseif(old('description') && !($errors->has('description')))
                    <textarea class="form-control is-valid" name="description"
                              id="description">{{$assignment->description ?? old('description')}}</textarea>
                @else
                    <textarea class="form-control" name="description"
                              id="description">{{$assignment->description ?? old('description')}}</textarea>
                @endif
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Category</label>
                @if($errors->has('category_id'))
                    <select class="form-select is-invalid" name="category_id">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">{{$errors->first('category_id')}}</span>
                @elseif(old('category_id') && !($errors->has('category_id')))
                    <select class="form-select is-valid" name="category_id">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                @else
                    <select class="form-select" name="category_id">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                @endif

            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Status</label>
                @if($errors->has('stat_id'))
                    <select class="form-select is-invalid" name="stat_id">
                        <option value="">Select a status</option>
                        @foreach($stats as $stat)
                            <option value="{{$stat->id}}" {{old('stat_id') == $stat->id ? 'selected' : ''}}>{{$stat->name}}</option>
                        @endforeach
                    </select>
                    <span class="invalid-feedback">{{$errors->first('stat_id')}}</span>
                @elseif(old('stat_id') && !($errors->has('stat_id')))
                    <select class="form-select is-valid" name="stat_id">
                        <option value="">Select a status</option>
                        @foreach($stats as $stat)
                            <option value="{{$stat->id}}" {{old('stat_id') == $stat->id ? 'selected' : ''}}>{{$stat->name}}</option>
                        @endforeach
                    </select>
                @else
                    <select class="form-select" name="stat_id">
                        <option value="">Select a status</option>
                        @foreach($stats as $stat)
                            <option value="{{$stat->id}}" {{old('stat_id') == $stat->id ? 'selected' : ''}}>{{$stat->name}}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Validity</label>
                @if($errors->has('validity'))
                    <input type="date" class="form-control is-invalid" name="validity"
                           value="{{$assignment->validity ?? old('validity')}}">
                    <span class="invalid-feedback">{{$errors->first('validity')}}</span>
                @elseif(old('validity') && !($errors->has('validity')))
                    <input type="date" class="form-control is-valid" name="validity"
                           value="{{$assignment->validity ?? old('validity')}}">
                @else
                    <input type="datetime-local" class="form-control" name="validity" value="{{$assignment->validity ?? old('validity')}}">
                @endif
            </div>
            <div class="content-buttons">
                <a class="btn btn-secondary" href="{{route('assignment.index')}}">Return</a>
                <button type="submit" class="btn btn-secondary">Create</button>
            </div>
        </form>
    </div>
@endsection
