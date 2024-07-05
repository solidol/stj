<h3>Лабораторні</h3>
@if ($currentJournal->hasPractices())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>
                    <div>Дата</div>
                    <div>Назва</div>
                </th>
                <th>Оцінка</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($currentJournal->practices as $control)
                @if ($control->title)
                    <tr>
                        <td>
                            <div>
                                {{ $control->date_->format('d.m.Y') ?? 'Дата не вказана' }}
                            </div>
                            <div>
                                {{ $control->title }}
                            </div>
                        </td>
                        <td>
                            <b class="mark-in-list">
                                {{ $control->mark(Auth::user()->userable_id)->mark_str ?? '-' }}
                            </b>
                            <span>з {{ $control->max_grade_str }}.
                            </span>
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
