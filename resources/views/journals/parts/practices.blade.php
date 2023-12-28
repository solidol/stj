<h3>Лабораторні</h3>
@if ($currentJournal->hasPractices())
    <table id="tdpr" class="table table-striped table-bordered m-0">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Назва</th>
                <th>Оцінка</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($currentJournal->practices as $control)
                @if ($control->title)
                    <tr>
                        <td>
                            {{ $control->date_->format('d.m.Y') ?? 'Дата не вказана' }}
                        </td>
                        <td>
                            {{ $control->title }}
                        </td>
                        <td>
                            <b
                                class="mark-in-list">{{ $control->mark(Auth::user()->userable_id)->mark_str ?? '-' }}</b><span>з
                                {{ $control->max_grade_str }}.</span>
                        </td>
                        <td>
                            <a href="{{ URL::route('student.practices.show', ['practice' => $control]) }}"
                                class="btn btn-success"><i class="bi bi-exclamation-triangle"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@else
    <p class="fs-4 text-danger">
        Лабораторні роботи не внесені в систему!
    </p>
@endif
