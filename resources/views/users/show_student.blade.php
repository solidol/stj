@extends('layouts.app-nosidebar')
@section('title', 'Мій профіль')
@section('content')
    <div class="baloon">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::user())
            <div class="row">

                <div class="col-12 col-md-4 text-center">
                    <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>
                    <p>
                        <a class="btn btn-primary fs-4" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Вихід
                        </a>
                    </p>
                </div>
                <div class="col-12 col-md-4 text-center d-none d-md-block">
                    <img src="/logo-big.svg" style="max-width: 300px">
                </div>
                <div class="col-12 col-md-4">
                    <p class="fs-3">Ваша група: {{ Auth::user()->userable->group->title }}</p>
                    <p class="fs-3">Ваш класний керівник: {{ Auth::user()->userable->group->curator->fullname }}</p>
                    <img class="avatar mx-auto d-block"
                        src="{{ config('app.api') }}/teachers/{{ Auth::user()->userable->group->curator->id }}/avatar">
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>
@endsection
