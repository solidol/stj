@if (Auth::user())
    @if (Auth::user()->isStudent())
        @include('menus.main_student')
    @elseif (Auth::user()->isAdmin())
        @include('menus.main_guest')
    @else
        @include('menus.main_guest')
    @endif
@else
    @include('menus.main_guest')
@endif
