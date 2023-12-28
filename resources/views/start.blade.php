@extends('layouts.app-simple')

@section('content')
    <h1 class="text-center">
        Електронний щоденник ХПФК
    </h1>

    <div class="text-center">
        <p class="fs-2">Тільки для авторизованих користувачів!</p>
        <p>
            <a class="btn btn-primary" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Увійти</a>
        </p>

    </div>
@endsection
