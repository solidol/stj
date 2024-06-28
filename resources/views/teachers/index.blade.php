@extends('layouts.app-nosidebar')

@section('title', 'Мої викладачі')




@section('content')
    <h1>
        Мої викладачі
    </h1>


    <div class="row">
        @foreach ($teachers as $teacher)
            <div class="col-12 col-md-6 col-xxl-4 py-1">
                <div class="rounded-1 bg-light m-1" style="height:100%">
                    <div class="row">
                        <div class="col-12 col-md-4 p-2">
                            <img class="avatar mx-auto d-block"
                                src="{{ route('teacher.avatar.get', ['id' => $teacher->id]) }}">
                        </div>
                        <div class="col-12 col-md-8 p-2">
                            <h2 class="text-center name-3">{{ $teacher->fullname }}</h2>
                            <ul class="list-unstyled mx-1">
                                @foreach ($teacher->journalsByGroup($group->kod_grup) as $journal)
                                    <li>
                                        <a class="" href="{{ route('journals.show', ['journal' => $journal]) }}">
                                            {{ $journal->subject->subject_name }}
                                        </a>
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@stop
