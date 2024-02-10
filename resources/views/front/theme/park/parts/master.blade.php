@include('front.theme.park.parts.header')
@yield('content')

<script type="text/javascript" src="{{ asset('front-theme-asset/park/js/jquery-3.5.1.min.js') }}"></script>
@yield('scripts')
@include('front.theme.park.parts.footer')

