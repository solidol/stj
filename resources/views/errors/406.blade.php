@extends('layouts.app')
@section('title', 'Помилка 406')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header  text-white bg-dark">Щось не так</div>

                <div class="card-body">
                    <h1>Помилка 406</h1>
                    <p>Посилання пошкоджене, неповне або прострочене.</p>
                    <p>Якщо посилання має термін давності, ви використали його занадто пізно.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
