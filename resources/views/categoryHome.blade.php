@extends('layouts.app')

@section('content')
    <div>
        @foreach($categories as $category)
            <div class="card" style="margin: 50px">
                <div class="card-header">
                    <span>{{$category->name}}</span>
                </div>
                <div class="card-body d-flex justify-content-around">
                    <div id="graph-bar" style="display: flex; align-items: flex-end">
                        @foreach($categories as $subCategory)
                            <div style="margin: 0 2px">
                                <div
                                    style="width:20px;padding-top: {{(500*$subCategory->count)/$total}}px;background-color:#313a46;{{$subCategory === $category ? 'background:#0eb985' : ''}}"></div>
                            </div>
                        @endforeach
                    </div>
                    <div id="pizza-graph"
                        style="align-self:center;width: 100px;height: 100px;background-color: #313a46;border-radius: 50%;display: flex;justify-content: center;align-items: center;border: 8px solid #0eb985">
                        <span style="color: #ffffff">{{$category->count}} / {{$total}}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

<style>
    @media(max-width: 770px){
        .card-body {
            flex-direction: column;
        }

        #pizza-graph {
            margin: 30px 50px auto 50px;
        }

        #graph-bar {
            margin: auto 50px;
        }
    }
</style>
