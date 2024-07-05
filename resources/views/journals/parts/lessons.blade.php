<h3>Проведені пари</h3>
<table class="table table-striped">
    <thead>
        <tr>

            <th></th>
            <th>Дата</th>
            <th>Тема</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        ?>
        @foreach ($currentJournal->lessons as $lesson)
            <tr>

                <td>
                    {{ $i++ }}
                </td>
                <td>
                    {{ $lesson->data_ ? $lesson->data_->format('d.m.y') : '' }}
                </td>
                <td>
                    {!! nl2br($lesson->tema) !!}
                    @if ($lesson->hasControl())
                        <span class="badge rounded-pill text-bg-danger">контроль</span>
                    @endif
                </td>

            </tr>
        @endforeach
    </tbody>
</table>
