<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-md-block d-none">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/assets/img/logo.png">
            <span class="ms-1 d-none d-lg-inline">
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

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('journals.index') }}">
                        <i class="bi bi-book"></i>
                        <span class="ms-1 d-none d-xl-inline">Мої журнали</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers.index') }}">
                        <i class="bi bi-people"></i>
                        <span class="ms-1 d-none d-xl-inline">Мої викладачі</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('absents.index') }}">
                        <i class="bi bi-person-slash"></i>
                        <span class="ms-1 d-none d-xl-inline">Мої пропуски</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shedules.show') }}">
                        <i class="bi bi-table"></i>
                        <span class="ms-1 d-none d-xl-inline">Мій розклад</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mdb.index') }}">
                        <i class="bi bi-database"></i>
                        <span class="ms-1 d-none d-xl-inline">Методична база
                        </span>
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle no-prevent" href="#" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-bounding-box"></i> {{ Auth::user()->userable->shortname }} <span
                            class="caret"></span>
                    </a>
                    <ul class="dropdown-menu bg-light">
                        <li>
                            <a class="dropdown-item" href="{{ route('users.profile.my') }}">
                                <i class="bi bi-person-lines-fill"></i>
                                Мій профіль
                            </a>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item no-prevent" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Вихід
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>


<!-- mobile -->

<nav class="navbar navbar-light bg-light fixed-bottom d-md-none">
    <div class="container-fluid justify-content-center">
        <div class="expand navbar-expand" id="navbarBottom">

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('journals.index') }}">
                        <i class="bi bi-book fs-3"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('teachers.index') }}">
                        <i class="bi bi-people fs-3"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('absents.index') }}">
                        <i class="bi bi-person-slash fs-3"></i>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mdb.index') }}">
                        <i class="bi bi-database fs-3"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shedules.show') }}">
                        <i class="bi bi-table fs-3"></i>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('users.profile.my') }}">
                        <i class="bi bi-person fs-3"></i>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
