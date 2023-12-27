@extends('layouts.app-nosidebar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Електронний щоденник
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (Auth::user())
                            <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>
                            <p>
                                <a class="btn" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i> Вихід
                                </a>
                            </p>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @else
                            <p class="fs-2">Тільки для авторизованих користувачів!</p>
                            <p class="fs-3">Для перегляду довідки авторизуйтеся за допомогою облікових даних електронного
                                журналу</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
