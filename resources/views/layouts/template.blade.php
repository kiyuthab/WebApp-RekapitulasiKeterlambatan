<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekam Keterlambatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.7.0/fonts/remixicon.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if (Auth::check())
    <nav class="navbar navbar-expand navbar-light bg-white shadow bottom-0 bg-body roundeds">
        <div class="sidebar-logo">
            <a class="fs-5" href="#">Rekam Keterlambatan</a>
        </div>
        <button class="btn" id="sidebar-toggle" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse navbar">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>Administrator
                </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="{{ route('logout') }}" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    @if (Auth::user()->role == "admin")
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <div class="h-100">
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"><path fill="currentColor" fill-rule="evenodd" d="M2.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 1.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 2.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041A1.5 1.5 0 0 0 6.96 5.85c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6A1.5 1.5 0 0 0 5.85 1.04C5.676 1 5.48 1 5.25 1H5.2zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.003.374-.014.417a.5.5 0 0 1-.37.37C5.575 5.996 5.509 6 5.2 6H2.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C2.004 5.575 2 5.509 2 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M9.8 1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 2.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6A1.5 1.5 0 0 0 9.15 6.96c.174.04.37.04.6.04h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.11-1.109c.04-.174.04-.37.04-.6v-2.5c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.003-.417-.014a.5.5 0 0 1-.37-.37C9.004 5.575 9 5.509 9 5.2V2.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37M2.75 8h2.5c.229 0 .426 0 .6.041A1.5 1.5 0 0 1 6.96 9.15c.04.174.04.37.04.6v2.5c0 .229 0 .426-.041.6a1.5 1.5 0 0 1-1.109 1.11c-.174.04-.37.04-.6.04h-2.5c-.229 0-.426 0-.6-.041a1.5 1.5 0 0 1-1.11-1.109c-.04-.174-.04-.37-.04-.6v-2.5c0-.229 0-.426.041-.6A1.5 1.5 0 0 1 2.15 8.04c.174-.04.37-.04.6-.04m.05 1c-.308 0-.374.003-.417.014a.5.5 0 0 0-.37.37C2.004 9.425 2 9.491 2 9.8v2.4c0 .308.003.374.014.417a.5.5 0 0 0 .37.37c.042.01.108.013.416.013h2.4c.308 0 .374-.004.417-.014a.5.5 0 0 0 .37-.37c.01-.042.013-.108.013-.416V9.8c0-.308-.003-.374-.014-.417a.5.5 0 0 0-.37-.37C5.575 9.004 5.509 9 5.2 9zm7-1h-.05c-.229 0-.426 0-.6.041A1.5 1.5 0 0 0 8.04 9.15c-.04.174-.04.37-.04.6v2.5c0 .229 0 .426.041.6a1.5 1.5 0 0 0 1.109 1.11c.174.041.371.041.6.041h2.5c.229 0 .426 0 .6-.041a1.5 1.5 0 0 0 1.109-1.109c.041-.174.041-.371.041-.6V9.75c0-.229 0-.426-.041-.6a1.5 1.5 0 0 0-1.109-1.11c-.174-.04-.37-.04-.6-.04h-.05zm-.417 1.014c.043-.01.11-.014.417-.014h2.4c.308 0 .374.003.417.014a.5.5 0 0 1 .37.37c.01.042.013.108.013.416v2.4c0 .308-.004.374-.014.417a.5.5 0 0 1-.37.37c-.042.01-.108.013-.416.013H9.8c-.308 0-.374-.004-.417-.014a.5.5 0 0 1-.37-.37C9.004 12.575 9 12.509 9 12.2V9.8c0-.308.003-.374.014-.417a.5.5 0 0 1 .37-.37" clip-rule="evenodd"/></svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                    <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 32 32">
                            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M12 8h15m-15 8h9m-9 8h15M7 24a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-8a1 1 0 1 1-2 0a1 1 0 0 1 2 0Zm0-8a1 1 0 1 1-2 0a1 1 0 0 1 2 0Z"/>
                        </svg>
                        Data Master
                    </a>
                    <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                        <li class="sidebar-item">
                            <a href="{{ route('rayon.home') }}" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data Rayon</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('rombel.home') }}" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data Rombel</a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{ route('user.home') }}" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data User</a>
                        </li>                                  
                        <li class="sidebar-item">
                            <a href="{{ route('student.home') }}" class="sidebar-link mx-4"><i class="ri-table-fill"></i> Data Siswa</a>
                        </li>
                    </ul>
                    <li class="sidebar-item">
                        <a href="{{ route('late.home') }}" class="sidebar-link collapsed" data-bs-target="#keterlambatan" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 32 32">
                            <g fill="currentColor">
                                <circle cx="18.078" cy="8.286" r="1" transform="rotate(-9 18.078 8.286)"/>
                                <path d="M8.045 8.862a1 1 0 0 0 .313 1.976zm4.263 1.35a1 1 0 0 0-.312-1.976zm-3.325 4.576a1 1 0 1 0 .313 1.976zm10.19.411a1 1 0 1 0-.313-1.975zM9.61 18.74a1 1 0 0 0 .313 1.976zm8.215.724a1 1 0 1 0-.313-1.975zM8.73 25.967l-.157-.988zm-2.29-1.664l-.988.157zm17.778-2.815l-.988.156zm-1.663 2.288l.157.987zM19.271 3.034l-.156-.987zm2.288 1.663l.988-.157zm-16.115.527l.156.988zM3.78 7.513l.988-.157zM26 10v17h2V10zm-1 18H11v2h14zm-14 0a1 1 0 0 1-1-1H8a3 3 0 0 0 3 3zm15-1a1 1 0 0 1-1 1v2a3 3 0 0 0 3-3zM25 9a1 1 0 0 1 1 1h2a3 3 0 0 0-3-3zM10 27v-2H8v2zM25 7h-3v2h3zM8.358 10.838l3.95-.626l-.312-1.976l-3.951.626zm.938 5.926l9.877-1.565l-.313-1.975l-9.877 1.564zm.626 3.95l7.901-1.251l-.312-1.975l-7.902 1.251zM5.6 6.213l13.828-2.19l-.313-1.975l-13.828 2.19zm14.972-1.359l2.66 16.79l1.975-.312l-2.66-16.79zM22.4 22.788l-13.828 2.19l.313 1.975l13.828-2.19zM7.428 24.147l-2.66-16.79l-1.975.312l2.66 16.79zm1.144.831a1 1 0 0 1-1.144-.831l-1.975.313a3 3 0 0 0 3.432 2.493zm14.66-3.334a1 1 0 0 1-.832 1.144l.313 1.975a3 3 0 0 0 2.494-3.432zM19.427 4.022a1 1 0 0 1 1.144.831l1.975-.313a3 3 0 0 0-3.432-2.493zm-14.14.215a3 3 0 0 0-2.495 3.432l1.976-.313A1 1 0 0 1 5.6 6.212z"/>
                            </g>
                        </svg>
                        Data Keterlambatan
                        </a>
                    </li>
                </ul>
                @endif
            </div> 
        </aside>
        @endif
        <div class="main" style="background-color: #D2E0FB; padding: 20px;">
            <div class="container mt-5">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @if(isset($script) && $script)

@else
</body>
</html>
@endif