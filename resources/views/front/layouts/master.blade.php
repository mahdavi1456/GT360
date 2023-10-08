<!DOCTYPE html>
<html dir="rtl">
    <head>
        @include('front.layouts.head')
        @yield('style')
    </head>
    <body>
        @include('front.layouts.header')
        @yield('content')
        @include('front.layouts.footer')
        @yield('scripts')
    </body>
</html>
