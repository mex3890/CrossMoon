@extends('layouts.app')
<link href="{{ asset('css/user.css') }}" rel="stylesheet">
@section('content')
    <div id="user-box">
        <div class="card-group">
            <div class="card">
                <div class="header-card">
                    <i class="bx bxs-envelope"></i>
                </div>
                <div class="body-card">
                    <h5>E-mail</h5>
                    <p>{{$user->email}}</p>
                    <button>Edit account</button>
                </div>
            </div>

            <div class="card">
                <div class="header-card">
                    <img src="{{asset('img/user_n1.png')}}">
                </div>
                <div class="body-card">
                    <h5>Name</h5>
                    <p>{{$user->name}}</p>
                    <button>@CrossMoon</button>
                </div>
            </div>

            <div class="card">
                <div class="header-card">
                    <i class='bx bxs-calendar-check'></i>
                </div>
                <div class="body-card">
                    <h5>Date</h5>
                    <p>{{$user->email_verified_at}}</p>
                    <button>Delete account</button>
                </div>
            </div>
        </div>
        <div id="lock">
            <div>
                <i class='bx bxs-lock-alt'></i>
                <div id="role">
                    <span>{{$user->role->name}}</span>
                    <div>
                        <i class='bx bxl-tux'></i>
                        <i class='bx bxl-windows'></i>
                        <i class='bx bxl-android'></i>
                        <i class='bx bxl-apple'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
