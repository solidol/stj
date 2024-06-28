@extends('layouts.app-nosidebar')

@section('content')
    <h1>Мій профіль</h1>
    <div class="baloon">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Auth::user())
            <p class="fs-2">Вітаємо, {{ Auth::user()->userable->fullname }}!</p>
            <p>
                <a class="btn btn-primary fs-4" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Вихід
                </a>
            </p>
            <?php
            dd(Auth::user());
            ?>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
    </div>
@endsection
