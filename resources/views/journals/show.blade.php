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
    <div class="baloon">
        <div class="row m-3">
            <div class="col-12 col-md-4 p-2">
                <img class="avatar mx-auto d-block"
                    src="{{ config('app.api') }}/teachers/{{ $currentJournal->teacher->id }}/avatar">
            </div>
            <div class="col-12 col-md-8 p-2 text-center">
                <p class="fs-4 name-3 mx-auto d-block">Викладач</p>
                <p class="fs-3 name-3 mx-auto d-block">{{ $currentJournal->teacher->fullname }}</p>
            </div>
        </div>

        <div>
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                        type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                        Оцінки
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                        type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                        Лабораторні
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                        type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                        Пари
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <p>
                        Н/А - неатестований
                    </p>
                    <p>
                        Зар - зараховано
                    </p>
                    @include('journals.parts.controls')
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <p>
                        Зар - зараховано
                    </p>
                    @include('journals.parts.practices')
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @include('journals.parts.lessons')
                </div>
            </div>
        </div>
    </div>

@stop
