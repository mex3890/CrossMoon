@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">CrossMoon</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        Finished: {{$finished}} - {{$percentageFinished}}<br>
                        In progress: {{$inProgress}}<br>
                        Created: {{$created}}<br>
                        {{$msg ?? 'Welcome to CrossMoon'}}
                </div>

                <div class="new-container">
                    <div class="d-flex align-items-baseline mb-3">
                        <div class="bar finish-bar"></div>
                        <div class="bar progress-bar"></div>
                        <div class="bar created-bar"></div>
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

    .bar {
        width: 50px;
        background-color: #0a53be;
        margin: 50px;
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
