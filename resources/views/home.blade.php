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

                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        <button type="submit" class="btn btn-primary fs-4">
                            <i class="bi bi-box-arrow-right"></i> Вихід
                        </button>
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
