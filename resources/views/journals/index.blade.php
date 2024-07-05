@extends('layouts.app-nosidebar')

@section('title', 'Мої дисципліни')


@section('content')
    <h1>
        Мої дисципліни
    </h1>
    <div class="row">
        @foreach ($journals as $journal)
            <div class="col-12 col-lg-6">
                <div class="row bg-light m-1 rounded-1">
                    <div class="col-11 col-md-10">

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <a class="text-decoration-none"
                                    href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                                    {{ $journal->subject->subject_name }}
                                    @if ($journal->parent)
                                        <i class="bi bi-vr fs-5"></i>
                                    @endif
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                {{ $journal->teacher->shortname }}
                            </div>
                        </div>

                    </div>
                    <div class="d-none d-md-block col-md-2">
                        <a class="text-decoration-none m-1"
                            href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                            <i class="bi bi-folder2-open fs-3"></i>
                            <span>
                                Відкрити
                            </span>
                        </a>
                    </div>
                    <div class="col-1 d-md-none p-0">
                        <a class="text-decoration-none my-2 p-0"
                            href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                            <i class="bi bi-caret-right fs-3 text-danger"></i>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>




@stop
