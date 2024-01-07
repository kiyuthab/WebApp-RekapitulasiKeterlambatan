<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapitulasi Keterlambatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rethink+Sans:wght@400;500&display=swap');
    </style>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <style>
    
        a,span,
        i {
            font-family: 'Rethink Sans', sans-serif;
            color: #3241b2;
        }

        .col {
            background-color: #f4f7fe;
        }

        #sidebar {
            box-shadow: 2px 0 0px 3px gray;
        }
    </style>
</head>

<body>

    <nav class="d-flex navbar bg-body-tertiary shadow p-1 ">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 ">Rekam Keterlambatan <i class='bx bx-menu'></i> </span>

            <nav class="navbar navbar-expand px-3 border-none">
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2">{{ optional(Auth::User())->name }}</i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route('logout') }}" class="dropdown-item">
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap ">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-white shadow p-2">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 min-vh-100">


                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start"
                        id="menu">
                        @if (Auth::check())
                            @if (Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a href="{{ route('home.pages') }}" class="nav-link align-middle px-0">
                                        <i class='bx bx-grid-alt'></i>
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"
                                            style="font-family: 'Rethink Sans', sans-serif;">Dashboard</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                        <i class='bx bx-server'></i>
                                        <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">Data
                                            Master</span> </a>
                                    <ul class="collapse show nav flex-column ms-1" id="submenu1" data-bs-parent="#menu"
                                        style="list-style-type:circle">
                                        <li class="w-100" style="margin: 0px 0px 0px 35px">
                                            <a href="{{ route('rombel.home') }}" class="nav-link px-0"> <span
                                                    class="d-none d-sm-inline">Data Rombel</span></a>
                                        </li>

                                        <li style="margin: 0px 0px 0px 35px">
                                            <a href="{{ route('rayon.home') }}" class="nav-link px-0"> <span
                                                    class="d-none d-sm-inline">Data Rayon</span></a>
                                        </li>

                                        <li style="margin: 0px 0px 0px 35px">
                                            <a href="{{ route('student.home') }}" class="nav-link px-0"> <span
                                                    class="d-none d-sm-inline">Data Siswa</span></a>
                                        </li>

                                        <li style="margin: 0px 0px 0px 35px">
                                            <a href="{{ route('user.home') }}" class="nav-link px-0"> <span
                                                    class="d-none d-sm-inline">Data User</span></a>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="{{ route('late.home') }}" class="nav-link px-0 align-middle">
                                        <i class='bx bx-bar-chart'></i>
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Data
                                            Keterlambatan</span> </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('ps.home') }}" class="nav-link align-middle px-0">
                                        <i class='bx bx-grid-alt'></i>
                                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline"
                                            style="font-family: 'Rethink Sans', sans-serif;">Dashboard</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('ps.student.home') }}" class="nav-link px-0 align-middle">
                                        <i class='bx bx-server'></i>
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Data
                                            Siswa</span> </a>
                                </li>

                                <li>
                                    <a href="{{ route('ps.late.home') }}" class="nav-link px-0 align-middle">
                                        <i class='bx bx-bar-chart'></i>
                                        <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">Data
                                            Keterlambatan</span> </a>
                                </li>
                            @endif
                        @endif

                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">
                @yield('content')
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    @stack('script')
</body>

</html>
