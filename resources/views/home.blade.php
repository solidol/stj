@extends('layouts.app-nosidebar')
@section('title', 'Електронний щоденник')
@section('content')
    <div class="baloon">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::user())
            <div class="row">
                <div class="col-12 col-md-6 text-center">
                    <img src="logo-big.svg" style="max-width: 300px">
                </div>
                <div class="col-12 col-md-6 text-center">
                    <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>

                    <p>
                        <a class="btn btn-primary fs-4" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right"></i> Вихід
                        </a>
                    </p>
                </div>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>
@endsection
