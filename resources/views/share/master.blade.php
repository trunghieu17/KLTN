<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
@include('share.css')
</head>
<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-col="2-columns">
    @include('share.head')
    @include('share.menu')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title mb-0">
                        @yield('title')
                    </h3>
                </div>
            </div>
            <div class="content-body">
                @yield('content')
            </div>
        </div>
    </div>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @include('share.footer')
    @include('share.js')

    @yield('js')
</body>
</html>
