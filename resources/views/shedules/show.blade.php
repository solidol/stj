@extends('layouts.app-nosidebar')

@section('content')
    <h1>Розклад (гр. {{ $student->group->title }})</h1>


    <div class="row">

        @for ($d = 1; $d <= 7; $d++)
            <?php
            $dw = date('w');
            if ($dw == 0) {
                $dw = 7;
            }
            ?>
            <div class="col-xl-3 col-md-6 col-sm-12 my-2">

                <div class="rounded-1 bg-light {{ $dw == $d ? 'border border-3 border-danger' : '' }}" style="height:100%">
                    <h2 class="fs-2">
                        {{ App\Library\CalendarHelper::$daysofweek[$d] }}
                    </h2>
                    <table class="table table-striped">

                        <thead>
                            <tr>
                                <th>
                                    П
                                </th>
                                <th>
                                    Дисципліна
                                </th>
                                <th>
                                    Т
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($p = 1; $p <= 8; $p++)
                                @foreach ($student->shedules as $shedule)
                                    @if ($shedule->day_of_week == $d && $shedule->lesson_number == $p)
                                        <tr>
                                            <td>
                                                {{ $shedule->lesson_number }}
                                            </td>
                                            <td>
                                                <p>
                                                    @if ($shedule->teacher2_id == Auth::user()->userable->id)
                                                        <i class="bi bi-vr fs-5"></i>
                                                    @endif
                                                    {{ $shedule->subject->title }}
                                                </p>
                                                <p>{{ $shedule->teacher->shortname }}</p>
                                            </td>
                                            <td nowrap>
                                                {{ $shedule->wt }}
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>

        @endfor

    </div>

@stop
