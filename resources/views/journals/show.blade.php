@extends('layouts.app')

@section('title', 'Журнал ' . $currentJournal->subject->subject_name)


@section('sidebar')
    <div class="baloon">
        <h2>
            <div class="d-inline-block d-md-none">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#journalsNavbar"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list"></i>
                </button>
            </div>
            Інші журнали
        </h2>

        <nav class="navbar navbar-light bg-white pt-1 pb-1">
            <div id="journalsNavbar" class="collapse d-md-block">
                <ul class="navbar-nav mr-auto mb-3">
                    @foreach ($journals as $journal)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                                {{ $journal->subject->subject_name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
@stop



@section('content')
    <h1>{{ $currentJournal->subject->subject_name }}</h1>
    <div class="row m-3">
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-xs-12">
            <img class="avatar mx-auto d-block"
                src="{{ route('teacher.avatar.get', ['id' => $currentJournal->teacher->id]) }}">
        </div>
        <div class="col-xl-10 col-lg-9 col-md-8 col-sm-6 col-xs-12 text-center">
            <p class="fs-3 name-3 mx-auto d-block">{{ $currentJournal->teacher->fullname }}</p>
            <p>
                Н/А, н/а, НА, на - неатестований
            </p>
            <p>
                Зар, зар, З, з - зараховано
            </p>
            </ul>
        </div>
    </div>


@stop
