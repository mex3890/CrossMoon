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
                            <table class="table table-striped">
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
                                        <td style="text-align: center"><button class="btn btn-primary" style="width: 100px">Finished</button></td>
                                    </tr>
                                    <tr>
                                        <td>In progress</td>
                                        <td>{{$inProgress}}</td>
                                        <td>{{$percentageInProgress*100}}%</td>
                                        <td style="text-align: center"><button class="btn btn-primary" style="width: 100px">In progress</button></td>
                                    </tr>
                                    <tr>
                                        <td>Created</td>
                                        <td>{{$created}}</td>
                                        <td>{{$percentageCreated*100}}%</td>
                                        <td style="text-align: center"><button class="btn btn-primary" style="width: 100px">Created</button></td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>{{$total}}</td>
                                        <td>100%</td>
                                        <td style="text-align: center"><button class="btn btn-primary" style="width: 100px">Total</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <div class="new-container">
                    <div class="d-flex align-items-baseline mb-3">
                        <div class="container-inter">
                            <div class="bar finish-bar"></div>
                            <span>Finished</span>
                        </div>
                        <div class="container-inter">
                            <div class="bar progress-bar"></div>
                            <span>In progress</span>
                        </div>
                        <div class="container-inter">
                            <div class="bar created-bar"></div>
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
    }

    .new-container div span {
        text-align: center;
    }

    .finish-bar{
        padding-top: {{$percentageFinished*300}};
    }

    .progress-bar{
        padding-top: {{$percentageInProgress*300}};
    }

    .created-bar{
        padding-top: {{$percentageCreated*300}};
    }
</style>
