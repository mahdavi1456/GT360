<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('asset/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{{ Auth::user()->name .' '. Auth::user()->family; }}}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="{{ route('dashboard') }}" class="nav-link main-menu">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview {{active_dropdown(['account.index'])}}">
                        <a href="#" class="nav-link main-menu">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                مشترکین
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sub-menu" {{active_list(['account.index'])}}>
                            <li class="nav-item {{ active_menu('account.index') }}">
                                <a href="{{ route('account.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview {{active_dropdown(['category.index', 'product.index'])}}">
                        <a href="#" class="nav-link main-menu">
                            <i class="nav-icon fa fa-th"></i>
                            <p>
                                محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sub-menu" {{active_list(['category.index', 'product.index'])}}>
                            <li class="nav-item" {{ active_menu('category.index') }}>
                                <a href="{{ route('category.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>دسته بندی</p>
                                </a>
                            </li>
                            <li class="nav-item" {{ active_menu('product.index') }}>
                                <a href="{{ route('product.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview  {{active_dropdown(['discount.index', 'transport.index'])}}">
                        <a href="#" class="nav-link main-menu">
                            <i class="nav-icon fa fa-gear"></i>
                            <p>
                                فروشگاه
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sub-menu" {{active_list(['discount.index', 'transport.index'])}}>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>سفارشات</p>
                                </a>
                            </li>
                            <li class="nav-item" {{ active_menu('discount.index') }}>
                                <a href="{{ route('discount.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>کدهای تخفیف</p>
                                </a>
                            </li>
                            <li class="nav-item" {{ active_menu('transport.index') }}>
                                <a href="{{ route('transport.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>حمل و نقل</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview {{active_dropdown(['payments_type.index'])}}">
                        <a href="#" class="nav-link main-menu">
                            <i class="nav-icon fa fa-clipboard"></i>
                            <p>
                                تنظیمات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview sub-menu" {{active_list(['payments_type.index'])}}>
                            <li class="nav-item" {{ active_menu('payments_type.index') }}>
                                <a href="{{ route('payments_type.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>روش های پرداخت</p>
                                </a>
                                <a href="#" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>عمومی</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
