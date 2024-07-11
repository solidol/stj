@extends('layouts.app-nosidebar')
@section('title', $teacher->fullname)
@section('content')
    <div class="baloon">




        <div class="row">
            <div class="col-12 col-md-4 p-2">
                <img class="avatar mx-auto d-block" src="{{ config('app.api') }}/teachers/{{ $teacher->id }}/avatar">
            </div>
            <div class="col-12 col-md-8 p-2">
                <h2 class="text-center name-3">{{ $teacher->fullname }}</h2>

                @foreach ($teacher->journalsByGroup($group->kod_grup) as $journal)
                    <div class="m-2">
                        <a class="btn btn-primary d-block" href="{{ route('journals.show', ['journal' => $journal]) }}">
                            {{ $journal->subject->subject_name }}
                        </a>

                    </div>
                @endforeach

            </div>
        </div>
        <div class="row">

        </div>

    </div>
@endsection
