<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top d-md-block d-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/assets/img/logo.png">
            <span class="ms-1 d-none d-xl-inline">
                {{ config('app.name', 'Laravel') }}
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-square"></i> Адміністрування <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('users.index', ['slug' => 'teachers']) }}"><i
                                    class="bi bi-list-ol"></i> Викладачі</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('users.index', ['slug' => 'students']) }}"><i
                                    class="bi bi-list-ol"></i> Студенти</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('events.index') }}"><i class="bi bi-list-ol"></i>
                                Лог подій</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-bounding-box"></i> {{ Auth::user()->userable->fullname }} <span
                            class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('users.profile.my') }}"><i
                                    class="bi bi-person-lines-fill"></i> Мій профіль</a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Вихід
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


<nav class="navbar navbar-light bg-danger fixed-bottom d-md-none">
    <div class="container-fluid justify-content-center">
        <div class="expand navbar-expand" id="navbarBottom">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index', ['slug' => 'teachers']) }}">
                        <i class="bi bi-people fs-4"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index', ['slug' => 'students']) }}">
                        <i class="bi bi-people-fill fs-4"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('events.index') }}">
                        <i class="bi bi-list-columns-reverse fs-4"></i>
                    </a>
                </li>


                <li class="nav-item dropup">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="bi bi-person-bounding-box"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a class="dropdown-item" href="{{ route('users.profile.my') }}"><i
                                    class="bi bi-person-lines-fill"></i> Мій профіль</a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Вихід
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
