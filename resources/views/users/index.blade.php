@extends('layouts.app-nosidebar')



@section('content')
    <h1>Користувачі журналу</h1>
    <div class="baloon">
        <table id="journal_users" class="table table-stripped">
            <thead>
                <tr>
                    <th>
                        <div>
                            Ім'я
                        </div>
                        <div>
                            email
                        </div>
                    </th>
                    <th>
                        Вхід
                    </th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <script type="module">
        $(document).ready(function() {
            $('#journal_users').DataTable({
                buttons: [],
                lengthMenu: [500],
                language: languageUk,
                ordering: false,
                processing: true,
                serverSide: true,
                searchDelay: 750,
                ajax: "{{ route('users.index', ['slug' => $slug]) }}",
                columns: [{
                        data: 'fullname',
                        name: 'fullname'
                    },

                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
        });
    </script>
@endsection
