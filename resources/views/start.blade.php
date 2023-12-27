@extends('layouts.app-simple')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Електронний щоденник
                    </div>

                    <div class="card-body">
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
                            <p>
                                <a class="btn btn-success" href="{{ route('login') }}"><i
                                        class="bi bi-box-arrow-in-right"></i> Увійти</a>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
