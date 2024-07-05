@extends('layouts.app-nosidebar')

@section('title', 'Мої пропуски')




@section('content')
    <h1>Мої пропуски</h1>
    <h2>
        {{ $data->title }}
    </h2>
    <div class="bg-light rounded-1 p-1">
        <nav class="nav row m-1">
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year, 'month' => '08']) }}">Серпень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year, 'month' => '09']) }}">Вересень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year, 'month' => '10']) }}">Жовтень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year, 'month' => '11']) }}">Листопад</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year, 'month' => '12']) }}">Грудень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '01']) }}">Січень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '02']) }}">Лютий</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '03']) }}">Березень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '04']) }}">Квітень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '05']) }}">Травень</a>
            </div>
            <div class="col-4 col-md-2 col-lg-1 p-1">
                <a class="btn btn-primary w-100"
                    href="{{ URL::route('absents.index', ['year' => $year + 1, 'month' => '06']) }}">Червень</a>
            </div>
        </nav>


        <div class="div-table">
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" value="" id="showSubject">
                <label class="form-check-label" for="showSubject">
                    Показати повністю назву дисципліни
                </label>
            </div>
            <table id="tbtable" class="table table-striped table-bordered table-table m-0">
                <thead>
                    <tr>
                        <th class="subj-name">
                            <div>
                                Предмет
                            </div>
                            <div>
                                Викладач
                            </div>
                        </th>

                        @foreach ($arDates as $dItem)
                            <th class="rotated-text sum">

                                {{ $dItem->raw->format('d.m.y') }}

                            </th>
                        @endforeach
                        <th class="rotated-text">
                            Всього
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($journals as $journal)
                        @if ($journal->lessonsDate($dateFrom->format('Y-m-d'), $dateTo->format('Y-m-d'))->count() > 0)
                            <tr>
                                <td class="subj-name">
                                    <div>
                                        {{ $journal->subject->subject_name }}
                                    </div>
                                    <div>
                                        {{ $journal->teacher->fullname }}
                                    </div>
                                </td>
                                <?php
                                $cnt = 0;
                                ?>
                                @foreach ($arDates as $dItem)
                                    <td class="hr-cnt {{ $dItem->dw == '6' || $dItem->dw == '0' ? 'we-cols' : '' }}">

                                        @foreach ($journal->lessonsDate($dateFrom->format('Y-m-d'), $dateTo->format('Y-m-d')) as $lesson)

                                            @if ($lesson->data_ == $dItem->raw)
                                                <div class="bg-dark text-white">
                                                    @if ($lesson->absent($user->userable->id))
                                                        <?php $cnt++; ?>
                                                        НБ
                                                    @else
                                                        &nbsp;
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach

                                    </td>
                                @endforeach
                                <td class="hr-cnt fw-bold">
                                    {{ $cnt > 0 ? $cnt : '-' }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
    <script type="module">
        $(document).ready(function() {
            $('#showSubject').click(function() {
                if ($(this).is(':checked')) {
                    $('table th.subj-name, table td.subj-name').css('overflow', 'none');
                    $('table th.subj-name, table td.subj-name').css('max-width', 'none');
                } else {
                    $('table th.subj-name, table td.subj-name').css('overflow', 'hidden');
                    $('table th.subj-name, table td.subj-name').css('max-width', '200px');
                }
            });


            $('#tbtable').DataTable({
                dom: 'Bfrtip',
                language: languageUk,
                buttons: [],
                "paging": false,
                "ordering": false,

            });
        });
    </script>
@stop
