<h3>Контролі</h3>
<table id="tdctrl" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Дата</th>
            <th>Контроль</th>
            <th>Оцінка</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currentJournal->controls as $control)
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
                            {{ $control->max_grade }} б.</span>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
