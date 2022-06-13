@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$msg ?? 'Welcome to CrossMoon'}}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div>
                            <table class="table table-striped home-table">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Occurrences</th>
                                        <th>Percentage</th>
                                        <th>Access</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Finished</td>
                                        <td>{{$finished}}</td>
                                        <td>{{$percentageFinished*100}}%</td>
                                        <td style="text-align: center"><a href="{{route('assignment.index', ['filter' => 'finished'])}}" class="btn btn-primary" style="width: 100px">Finished</a></td>
                                    </tr>
                                    <tr>
                                        <td>In progress</td>
                                        <td>{{$inProgress}}</td>
                                        <td>{{$percentageInProgress*100}}%</td>
                                        <td style="text-align: center"><a href="{{route('assignment.index', ['filter' => 'inProgress'])}}" class="btn btn-primary" style="width: 100px">In progress</a></td>
                                    </tr>
                                    <tr>
                                        <td>Created</td>
                                        <td>{{$created}}</td>
                                        <td>{{$percentageCreated*100}}%</td>
                                        <td style="text-align: center"><a href="{{route('assignment.index', ['filter' => 'created'])}}" class="btn btn-primary" style="width: 100px">Created</a></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$total}}</td>
                                        <td>100%</td>
                                        <td style="text-align: center"><a href="{{route('assignment.index')}}" class="btn btn-primary" style="width: 100px">Total</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="new-container">
                    <div class="d-flex align-items-baseline mb-3">
                        <div class="container-inter">
                            <div title="{{$percentageFinished*100}}%" class="bar finish-bar"></div>
                            <span>Finished</span>
                        </div>
                        <div class="container-inter">
                            <div title="{{$percentageInProgress*100}}%" class="bar progress-bar"></div>
                            <span>In progress</span>
                        </div>
                        <div class="container-inter">
                            <div title="{{$percentageCreated*100}}%" class="bar created-bar"></div>
                            <span>Created</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>

    .new-container {
        display: flex;
        justify-content: center;
    }

    .container-inter {
        display: flex;
        flex-direction: column;
    }

    .bar {
        width: 50px;
        background-color: #0a53be;
        margin: 50px 50px 0 50px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
    }

    .new-container div span {
        text-align: center;
        font-weight: bold;
        color: rgb(131, 131, 131);
        border-top: 1px solid #000000;
    }

    .finish-bar{
        background: linear-gradient(to top, #2c2c2c, #4d4d4d);
        padding-top: {{$percentageFinished*300}};
    }

    .progress-bar{
        background: linear-gradient(to top, #4d4d4d, rgb(114, 114, 114));
        padding-top: {{$percentageInProgress*300}};
    }

    .created-bar{
        background: linear-gradient(to top, rgb(114, 114, 114), #b4b4b4);
        padding-top: {{$percentageCreated*300}};
    }

    .home-table td, .home-table th {
        text-align: center;
    }
</style>
