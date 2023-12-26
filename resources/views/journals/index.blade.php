@extends('layouts.app-nosidebar')

@section('title', 'Мої дисципліни')


@section('content')
    <h1>
        Мої дисципліни
    </h1>



    <table class="table table-striped">
        <tbody>
            @foreach ($journals as $journal)
                <tr>

                    <td>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                {{ $journal->subject->subject_name }}
                                @if ($journal->parent)
                                    <i class="bi bi-vr fs-5"></i>
                                @endif
                            </div>
                            <div class="col-sm-12 col-md-6">
                                {{ $journal->teacher->shortname }}
                            </div>
                        </div>
                    </td>
                    <td>
                        <a class="btn py-0" href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                            <i class="bi bi-folder2-open fs-3"></i>
                            <span class="ms-1 d-none d-sm-inline">
                                Відкрити
                            </span>
                        </a>

                        <a class="btn py-0 d-md-inline-block d-none"
                            href="{{ URL::route('lessons.index', ['journal' => $journal]) }}">
                            <i class="bi bi-pencil-square fs-3"></i>
                            <span class="ms-1 d-none d-sm-inline">
                                Пари
                            </span>
                        </a>
                        <a class="btn py-0 d-md-inline-block d-none"
                            href="{{ URL::route('journals.show', ['journal' => $journal]) }}">
                            <i class="bi bi-5-square fs-3"></i>
                            <span class="ms-1 d-none d-sm-inline">
                                Оцінки
                            </span>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>




@stop
