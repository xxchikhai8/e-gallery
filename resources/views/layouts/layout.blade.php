<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    @include('layouts.head')
</head>

<body class="d-flex flex-column">
    @include('components.icon')
    <div id="pjax-component">
        <header>
            <nav class="navbar fixed-top">
                <div class="container-fluid">
                    <a type="button" class="nav-button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas">
                        <svg width="26" height="26">
                            <use href="#list-button" />
                        </svg>
                    </a>
                    <a class="nav-link me-auto ms-2 text-shading" aria-current="page"
                        href="/">{{ config('app.name') }}</a>
                    @guest
                        <a class="nav-link ms-auto me-2 d-lg-block d-sm-block d-none text-shading" aria-current="page" href="/login">
                            <svg style="padding-left: 2px" class="me-1" width="24" height="24"><use href="#login" />
                        </svg>Login</a>
                    @endguest
                    @auth
                        <a class="nav-link ms-auto me-3 d-lg-block d-sm-block d-none text-shading dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{asset('storage/avatar/' . Auth::user()->avatar)}}" class="rounded-circle" width="36" height="36">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end">
                            <li><a class="dropdown-item mb-2 pe-none">Hi, {{Auth::user()->full_name}}</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="#" onclick="window.location.reload(true);" class="dropdown-item mb-2">Follow</a></li>
                            <li><a href="/user/my-story" class="dropdown-item mb-2">My Story</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a href="/user/0" class="dropdown-item mb-2">Account</a></li>
                            <li><a href="/" class="dropdown-item mb-2">Setting</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="get">
                                    <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
                                    <button type="submit" class="dropdown-item"><svg width="24" height="24" class="me-1"><use href="#logout"></svg>Log Out</button>
                                </form>
                            </li>
                        </ul>
                    @endauth

                </div>
                <div class="offcanvas offcanvas-start" z-index="0" id="offcanvas" aria-labelledby="offcanvas">
                    <div class="offcanvas-body">
                        <div class="offcanvas-item" type="button">
                            <a class="d-flex justify-content-between offcanvas-link" href="/">Home</a>
                        </div>
                        <div><hr></div>
                        <div class="offcanvas-item" type="button">
                            <a class="d-flex justify-content-between offcanvas-link" href="/story">Story</a>
                        </div>
                        <div class="offcanvas-item">
                            <a class="d-flex justify-content-between offcanvas-link" data-bs-toggle="collapse"
                                href="#collapse1" aria-expanded="false" aria-controls="collapse" type="button"
                                id="CollapseBtn1">Category<svg id="CollapseIcon1" width="24" height="24">
                                    <use href="#left-chevron"/>
                                </svg></a>
                        </div>
                        <ul class="collapse" id="collapse1">
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/story/category/TagA">All Categories</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/story/category/TagA">Caterori A</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/story/category/TagB">Caterori B</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/story/category/TagC">Caterori C</a>
                            </li>
                        </ul>
                        <div class="offcanvas-item" type="button">
                            <a class="d-flex justify-content-between offcanvas-link" href="/gallery">Gallery</a>
                        </div>
                        <div class="offcanvas-item">
                            <a class="d-flex justify-content-between offcanvas-link" data-bs-toggle="collapse"
                                href="#collapse2" aria-expanded="false" aria-controls="collapse" type="button"
                                id="CollapseBtn2">Tag<svg id="CollapseIcon2" width="24" height="24">
                                    <use href="#left-chevron"/>
                                </svg></a>
                        </div>
                        <ul class="collapse" id="collapse2">
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/tag">All Tag</a>
                            </li>
                            @foreach ($tags as $tag)
                                <li class="offcanvas-item" type="button">
                                    <a class="d-flex justify-content-between offcanvas-link" href="/images/tag/{{$tag->tag_name}}">{{ucwords(str_replace('-', ' ', $tag->tag_name))}}</a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="offcanvas-item" type="button">
                            <a class="d-flex justify-content-between offcanvas-link" href="/music">Music</a>
                        </div>
                        <div class="offcanvas-item">
                            <a class="d-flex justify-content-between offcanvas-link" data-bs-toggle="collapse"
                                href="#collapse3" aria-expanded="false" aria-controls="collapse" type="button"
                                id="CollapseBtn3">Option<svg id="CollapseIcon3" width="24" height="24">
                                    <use href="#left-chevron"/>
                                </svg></a>
                        </div>
                        <ul class="collapse" id="collapse3">
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/upload/audio">Upload Audio</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/upload/image">Upload Image</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/new/tag">New Tag</a>
                            </li>
                        </ul>
                        <div class="offcanvas-item">
                            <a class="d-flex justify-content-between offcanvas-link" data-bs-toggle="collapse"
                                href="#collapse4" aria-expanded="false" aria-controls="collapse" type="button"
                                id="CollapseBtn4">Manage<svg id="CollapseIcon4" width="24" height="24">
                                    <use href="#left-chevron"/>
                                </svg></a>
                        </div>
                        <ul class="collapse" id="collapse4">
                            <li class="offcanvas-item" type="button">
                                <a class="offcanvas-link" href="/manage/audio">Manage Audio</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/manage/image">Manage Image</a>
                            </li>
                            <li class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between offcanvas-link" href="/manage/tag">Manage Tag</a>
                            </li>
                        </ul>
                        @auth
                            <div class="d-lg-none d-sm-none d-block"><hr></div>
                            <div class="offcanvas-item" type="button">
                                <a class="d-flex justify-content-between align-items-center offcanvas-link d-lg-none d-sm-none d-block" data-bs-toggle="collapse"
                                    href="#collapseUser" aria-expanded="false" aria-controls="collapse" type="button"
                                    id="CollapseBtnUser"><img src="{{asset('storage/avatar/' . Auth::user()->avatar)}}" class="rounded-circle me-2" width="36" height="36"><span class="me-auto">Hi, {{Auth::user()->full_name}}</span><svg class="ps-auto" id="CollapseIconUser" width="24" height="24">
                                        <use href="#left-chevron"/>
                                    </svg></a>
                            </div>
                            <ul class="collapse d-lg-none d-sm-none" id="collapseUser">
                                <li class="offcanvas-item" type="button">
                                    <a class="d-flex justify-content-between offcanvas-link" href="/user/0">Account</a>
                                </li>
                                <li class="offcanvas-item" type="button">
                                    <a class="d-flex justify-content-between offcanvas-link" href="/setting">Setting</a>
                                </li>
                            </ul>
                        @endauth
                    </div>
                    <div class="offcanvas-footer">
                        @guest
                            <div class="offcanvas-item d-lg-none d-sm-none d-block">
                                <svg style="padding-left: 3px" width="24" height="24">
                                    <use href="#login" />
                                </svg>
                                <a type="button" class="offcanvas-logout" href="/login">Log in</a>
                            </div>
                        @endguest
                        @auth
                            <div class="d-flex justify-content-between offcanvas-item d-lg-none d-sm-none d-block">
                                <form action="/logout" method="get" class="offcanvas-logout">
                                    <input type="hidden" name="current_page" value="{{Request::getRequestUri()}}">
                                    <button type="submit" class="button"><svg width="24" height="24" class="me-2"><use href="#logout"></svg>Log Out</button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </header>
        <main class="flex-shrink-0">
            <div class="container-fluid">
                @yield('breadcrumb')
            </div>
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        <footer class="mt-auto" id="footer">
            <div class="text-center fw-bold">
                <span>2023 &copy; 210 Gallery. All rights reserved</span>
            </div>
        </footer>
    </div>
    @include('layouts.script')
</body>

</html>
