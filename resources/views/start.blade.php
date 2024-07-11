@extends('layouts.app-simple')
@section('title', 'Електронний щоденник ХПФК')
@section('content')
    <div class="text-center">
        <p class="fs-2">Тільки для авторизованих користувачів!</p>
        <p>
            <a class="btn btn-primary" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Увійти</a>
        </p>

    </div>
@endsection
