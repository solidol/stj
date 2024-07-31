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
                <div class="form-group row mb-2">
                    <label for="email" class="col-3 col-form-label text-md-right">Контактний e-mail</label>
                    <div class="col-6">
                        <input type="email" class="form-control" name="email" id="email"
                            value="{{ $teacher->user->email }}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="skype" class="col-3 col-form-label text-md-right">Skype</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="skype" id="skype"
                            value="{{ $teacher->user->skype_id }}" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="viber" class="col-3 col-form-label text-md-right">Viber</label>
                    <div class="col-6">
                        <input type="text" class="form-control" name="viber" id="viber"
                            value="{{ $teacher->user->viber_id }}" readonly>
                    </div>
                    <div class="col-3 col-form-label text-danger">

                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="skype" class="col-3 col-form-label text-md-right">Telegram</label>
                    <div class="col-6">
                        <input type="telegram" class="form-control" name="telegram" id="telegram"
                            value="{{ $teacher->user->telegram_id }}" readonly>
                    </div>
                    <div class="col-3 col-form-label text-danger">

                    </div>
                </div>
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
