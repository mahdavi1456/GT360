<!DOCTYPE html>
<html dir="rtl">
    <head>
        @include('front.layouts.head')
        @yield('style')
    </head>
    <body>
        <div id="loader">
            <div class="loader"></div>
        </div>
        @include('front.layouts.header')
        @yield('content')
        @include('front.layouts.footer')
        @yield('scripts')
    </body>
</html>
