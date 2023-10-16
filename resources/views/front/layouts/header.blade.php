    <div id="first-cover" style="background: url( <?php echo asset('v1/images/banner-2.jpg') ?> );">
        <div class="container">
            <header id="top-header">
                <div class="row">
                    <div class="col-4">
                        <a href="/">
                            <img src="{{ asset('v1/images/logo.png') }}" style="width: 200px;" class="img-fluid">
                        </a>
                    </div>
                    <div class="col-8">
                        <a href="" class="btn btn-success">پروفایل</a>
                        <a href="{{ route('showCart') }}" class="btn btn-success"><i class="fa fa-shopping-cart"></i><span class="badge badge-danger" id="cartItemCount">{{ $cartItemCount }}</span></a>
                    </div>
                </div>
            </header>
        </div>
        @yield('page-header')
    </div>