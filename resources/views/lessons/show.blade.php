@extends('layouts.app-nosidebar')

@section('title', $lesson->journal->subject->title)


@section('content')
    <div class="baloon">
        <h2>
            {{ $lesson->tema }}
        </h2>
        <h2>
            {{ $lesson->journal->teacher->fullname }}
        </h2>
        @if ($lesson->isPresent(Auth::user()->userable))
            <div class="my-2 p-2 border border-2 border-danger rounded-2">
                <p class="text-danger text-center">
                    Ви відмітилися!
                </p>
                <p>
                    Подальші дії з вашого боку не потрібні. Після закінчення терміну дії посилання, викладач синхронізує
                    дані.
                </p>
            </div>
        @else
            <form method="post" method="post">
                @csrf
                <div class="my-2 p-2 border border-2 border-danger rounded-2">
                    <p class="my-2">
                        Натисніть кнопку "Відмітитися", щоб зберегти дані про вашу присутність на парі.
                    </p>
                    <input type="hidden" name="lesson_id" value="{{ $lesson->kod_pari }}">
                    <button type="submit" class="btn btn-primary">Відмітитися</button>
                </div>
            </form>
        @endif
    </div>
@stop
