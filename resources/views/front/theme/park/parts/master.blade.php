@include('front.theme.park.parts.header')
@yield('content')

<script type="text/javascript" src="{{ asset('front-theme-asset/park/js/jquery-3.5.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('js/validation.js') }}"></script>
@include('sweetalert::alert')

@yield('scripts')
@include('front.theme.park.parts.footer')

