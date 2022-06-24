@extends('layouts.app')

<link href="{{ asset('css/assignment.css') }}" rel="stylesheet">
@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div id="sub-table" class="col-md-8">
                <div id="table" class="card">
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
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Finished</td>
                                    <td>{{$finished}}</td>
                                    <td>{{$percentageFinished*100}}%</td>
                                </tr>
                                <tr>
                                    <td>In progress</td>
                                    <td>{{$inProgress}}</td>
                                    <td>{{$percentageInProgress*100}}%</td>
                                </tr>
                                <tr>
                                    <td>Created</td>
                                    <td>{{$created}}</td>
                                    <td>{{$percentageCreated*100}}%</td>
                                </tr>
                                <tr>
                                    <td>Expired</td>
                                    <td>{{$expired}}</td>
                                    <td>{{$percentageExpired*100}}%</td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>{{$total}}</td>
                                    <td>100%</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="new-container">
                        <div class="d-flex align-items-baseline mb-3">
                            <div class="container-inter {{$finished === 0 ? 'empty' : ''}}">
                                <div title="{{$percentageFinished*100}}%" class="bar finish-bar"></div>
                                <span>Finished</span>
                            </div>
                            <div class="container-inter {{$inProgress === 0 ? 'empty' : ''}}">
                                <div title="{{$percentageInProgress*100}}%" class="bar progress-bar"></div>
                                <span>In progress</span>
                            </div>
                            <div class="container-inter {{$created === 0 ? 'empty' : ''}}">
                                <div title="{{$percentageCreated*100}}%" class="bar created-bar"></div>
                                <span>Created</span>
                            </div>
                            <div class="container-inter {{$expired === 0 ? 'empty' : ''}}">
                                <div title="{{$percentageExpired*100}}%" class="bar expired-bar"></div>
                                <span>Expired</span>
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
        margin: 50px 50px 0 50px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        background: linear-gradient(to top, #21262f, #67708a);
    }

    .new-container div span {
        text-align: center;
        font-weight: bold;
        color: rgb(131, 131, 131);
        border-top: 1px solid #65778d;
    }

    .finish-bar {
        padding-top: {{$percentageFinished*300}};
    }

    .progress-bar {
        padding-top: {{$percentageInProgress*300}};
    }

    .created-bar {
        padding-top: {{$percentageCreated*300}};
    }

    .expired-bar {
        padding-top: {{$percentageExpired*300}};
    }

    .home-table td, .home-table th {
        text-align: center;
    }

    .empty {
        display: none;
    }
</style>
