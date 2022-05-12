<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resturant</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/customize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customize.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light nav-bar">
            <div class="container main-bar">

                <a class="navbar-brand" href="{{ route('home') }}"><strong>SEY<span
                            class="zz">HA</span></strong> </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @php
                    $routeName = Route::currentRouteName();
                @endphp
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0 ">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Staff</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ $routeName == 'staff' ? 'active' : null }}"
                                        href="{{ route('staff') }}">Add Staff</a></li>

                                <li><a class="dropdown-item {{ $routeName == 'show-staff' ? 'active' : null }}"
                                        href="{{ route('show-staff') }}">List Staff</a>
                                </li>

                                <li><a class="dropdown-item {{ $routeName == 'add-r' ? 'active' : null }}"
                                        href="{{ route('add-r') }}">Add Restaurant</a></li>

                                <li><a class="dropdown-item {{ $routeName == 'show-list' ? 'active' : null }}"
                                        href="{{ route('show-list') }}">List Restaurant</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Image</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item {{ $routeName == 'add-f' ? 'active' : null }}"
                                        href="{{ route('add-f') }}">Add Image</a></li>

                                <li><a class="dropdown-item {{ $routeName == 'list-files' ? 'active' : null }}"
                                        href="{{ route('list-files') }}">List Image</a>
                                </li>

                            </ul>
                        </li>

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'show-staff' ? 'active' : null }}"
                                href="{{ route('show-staff') }}">List Staff</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'add-r' ? 'active' : null }}"
                                href="{{ route('add-r') }}">Add</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'show-list' ? 'active' : null }}"
                                href="{{ route('show-list') }}">List</a>
                        </li> --}}

                        {{-- <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'add-f' ? 'active' : null }}"
                                href="{{ route('add-f') }}">Add Image</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'list-files' ? 'active' : null }}"
                                href="{{ route('list-files') }}">List Image</a>
                        </li> --}}

                        <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'login' ? 'active' : null }}"
                                href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $routeName == 'register' ? 'active' : null }}"
                                href="{{ route('register') }}">Register</a>
                        </li>

                    </ul>

                    {{-- search --}}
                    {{-- <form class="d-flex" method="GET" action="{{ route('search') }}">
                        <input class="form-control me-2 search-box" id="search-restaurant" name="query" type="text"
                            placeholder="Search Rastaurant" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}

                    {{-- live search --}}
                    {{-- <form class="d-flex" method="GET" action="{{ route('search') }}">
                        <input class="form-control me-2 search-box" id="search" name="query" type="text"
                            placeholder="Search Rastaurant" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}

                </div>
            </div>
        </nav>
    </header>

    <div>
        @if (session('message'))
            <div class="container mt-5">
                <div class="row message-alert">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        <strong>Alert mesage!</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif

        <div class="content">
            @yield('content')
        </div>
    </div>
    <footer>
        {{-- copy right by Rasturant App --}}
    </footer>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        // $(function() {
        //     $('input#search').on('keyup', function() {
        //         var query = $(this).val();
        //         // console.log(query);
        //         $.ajax({
        //             url: "search",
        //             type: "GET",
        //             data: {
        //                 'search': query
        //             },
        //             success: function(res) {
        //                 // console.log(res);
        //                 $('tbody#search-list').html(res.html);
        //             }
        //         });
        //     });
        // });
    </script>

    @stack('scripts')

</body>

</html>
