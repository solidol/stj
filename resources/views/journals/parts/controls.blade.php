<h3>Контролі</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>
                <div>Дата</div>
                <div>Контроль</div>
            </th>
            <th>Оцінка</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currentJournal->controls as $control)
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
                        <span>
                            з {{ $control->max_grade }} б.
                        </span>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
