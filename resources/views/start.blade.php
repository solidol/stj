@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="">
                    <h1>Електронний щоденник ХПФК</h1>
                </div>

                <div class="">
                    @if (Auth::user())
                        <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>
                        <p class="fs-3">
                            <a class="btn fs-2" href="{{ route('logout') }}"
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
@endsection
