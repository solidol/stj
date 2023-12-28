@extends('layouts.app-nosidebar')

@section('title', 'Мої викладачі')




@section('content')
    <h1>
        Мої викладачі
    </h1>

    <div class="container-fluid">

            @foreach ($teachers as $teacher)
                <div class="row teacher-card">
                    <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <img class="avatar mx-auto d-block" src="{{ route('teacher.avatar.get', ['id' => $teacher->id]) }}">
                    </div>
                    <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-xs-12">
                        <h2 class="text-center name-3">{{ $teacher->fullname }}</h2>
                        <ul class="list-unstyled">
                            @foreach ($teacher->journalsByGroup($group->kod_grup) as $journal)
                                <li>
                                    <a class="" 
                                        href="{{ route('journals.show', ['journal' => $journal]) }}">
                                        {{ $journal->subject->subject_name }}
                                    </a>
                                    </p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach

    </div>


@stop
