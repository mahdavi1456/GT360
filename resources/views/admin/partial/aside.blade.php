<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="{{ asset('asset/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>
    @php
        $account = auth()->user()->account;
        $accountId = $account->id;
    @endphp
    <div class="sidebar">
        <div>
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image d-flex justify-content-center align-items-center">
                    <img src="{{ $account->account_image ? asset(ert('aip') . $account->account_image) : asset('asset/dist/img/avatar5.png') }}"
                        class="img-circle elevation-2">
                </div>
                <div class="info">
                    <a href="{{ route('account.profile.edit', $account->id) }}"
                        class="d-block">{{ Auth::user()->name . ' ' . Auth::user()->family }}</a>
                    <small style="color: #c1c1c1e6;font-size: x-small;">{{ $account->account_acl_value }}</small>
                </div>
            </div>
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    @php
                        $project = App\Models\Project::checkOpenProject(auth()->user()->account->id);
                        if ($project) {
                            $projectName = App\Models\Project::getProjectName($project->project_id);
                        } else {
                            $projectName = '';
                        }
                    @endphp
                    @if ($project)
                        <li class="nav-item has-treeview">
                            <a href="{{ route('dashboard') }}" class="nav-link main-menu">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>میز کار</p>
                                {{ $projectName }}
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('media.index') }}" class="nav-link main-menu">
                                <i class="nav-icon fa fa-file-video-o"></i>
                                <p>رسانه</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="{{ route('project.index') }}" class="nav-link main-menu">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>مدیریت پروژه ها</p>
                            </a>
                        </li>
                        @can('SuperAccount')
                            <li
                                class="nav-item has-treeview {{ active_dropdown(['theme.index', 'nav.index', 'taxonomy.index', 'component.index', 'font.index', 'pallete.index', 'setting.index', 'plan.index']) }}">
                                <a href="#" class="nav-link main-menu">
                                    <i class="nav-icon fa fa-lock text-danger"></i>
                                    <p>تعاریف پایه <i class="right fa fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview sub-menu" {{ active_list(['theme', 'theme.index']) }}>
                                    <li class="nav-item" {{ active_menu('theme') }}>
                                        <a href="{{ route('theme.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>قالب ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('nav.index') }}>
                                        <a href="{{ route('nav.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>فهرست ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('taxonomy', 'taxonomy.create') }}>
                                        <a href="{{ route('taxonomy.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>طبقه بندی ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('theme') }}>
                                        <a href="{{ route('component.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>بخش ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('font.index') }}>
                                        <a href="{{ route('font.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>فونت ها</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('pallete.index') }}>
                                        <a href="{{ route('pallete.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>پالت های رنگ</p>
                                        </a>
                                    </li>
                                    <li class="nav-item" {{ active_menu('setting.index') }}>
                                        <a href="{{ route('setting.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>تنظیمات</p>
                                        </a>
                                    </li>
                                    <li class="nav-item {{ active_menu('plan.index') }}">
                                        <a href="{{ route('plan.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>پکیج ها</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        @can('SuperAccount')
                            <li class="nav-item has-treeview {{ active_dropdown(['account.index']) }}">
                                <a href="#" class="nav-link main-menu">
                                    <i class="nav-icon fa fa-lock text-danger"></i>
                                    <p>مشترکین <i class="right fa fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview sub-menu" {{ active_list(['account.index']) }}>
                                    <li class="nav-item {{ active_menu('account.index') }}">
                                        <a href="{{ route('account.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endcan

                        <li
                            class="nav-item has-treeview {{ active_dropdown(['user.showUsers', 'account.profile.edit']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-th"></i>
                                <p>
                                    پروفایل
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview sub-menu"
                                {{ active_list(['account.profile.edit', 'user.showUsers']) }}>
                                <li class="nav-item {{ active_menu('user.showUsers') }}">
                                    <a href="{{ route('user.showUsers', ['accountId' => Auth::user()->account_id]) }}"
                                        class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>کاربران</p>
                                    </a>
                                </li>
                                @canany(['agent', 'cos'])
                                    <li class="nav-item {{ active_menu('subsets') }}">
                                        <a href="{{ route('subsets') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>زیرمجموعه ها</p>
                                        </a>
                                    </li>
                                @endcanany
                                <li class="nav-item {{ active_menu('account.profile.edit') }}">
                                    <a href="{{ route('account.profile.edit', ['account' => Auth::user()->account]) }}"
                                        class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تکمیل اطلاعات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview  {{ active_list(['discount.index', 'addons.index', 'addons.edit', 'payments_type.index', 'transport.index', 'shopSetting']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-cubes"></i>
                                <p>فروشگاه <i class="right fa fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview sub-menu"
                                {{ active_list(['discount.index', 'addons.index', 'addons.edit', 'payments_type.index', 'transport.index', 'shopSetting']) }}>
                                <li class="nav-item" {{ active_menu('product.index') }}>
                                    <a href="{{ route('product.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>محصولات</p>
                                    </a>
                                </li>
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
                                <li class="nav-item" {{ active_menu(['addons.index', 'addons.edit']) }}>
                                    <a href="{{ route('addons.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>افزودنی های سفارش</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('payments_type.index') }}>
                                    <a href="{{ route('payments_type.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>روش های پرداخت</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('transport.index') }}>
                                    <a href="{{ route('transport.index') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>حمل و نقل</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('shopSetting') }}>
                                    <a href="{{ route('shopSetting') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>تنظیمات فروشگاه</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ active_dropdown(['shopSetting']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-clipboard"></i>
                                <p>
                                    طراحی ظاهر
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview sub-menu"
                                {{ active_list(['theme.choose', 'theme.personalize', 'theme-setting.index', 'social-media.index']) }}>
                                <li class="nav-item" {{ active_menu('theme.choose') }}>
                                    <a href="{{ route('theme.choose') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>قالب</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('theme.personalize') }}>
                                    <a href="{{ route('theme.personalize') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>شخصی سازی</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('social-media.index') }}>
                                    <a href="{{ route('social-media.index') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>شبکه های اجتماعی</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('theme-setting.index') }}>
                                    <a href="{{ route('theme-setting.index') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>تنظیمات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview {{ active_dropdown(['themeComponents', 'page.index', 'nav.items']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-clipboard"></i>
                                <p>
                                    محتوا
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview sub-menu" {{ active_list(['page.index']) }}>
                                <li class="nav-item" {{ active_menu('page.index') }}>
                                    <a href="{{ route('page.index') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>صفحات</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('themeComponents') }}>
                                    <a href="{{ route('themeComponents') }}" class="nav-link">
                                        <i class="fa fa-edit text-warning nav-icon"></i>
                                        <p>مدیریت محتوا</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('nav.items') }}>
                                    <a href="{{ route('nav.items') }}" class="nav-link">
                                        <i class="fa fa-edit text-warning nav-icon"></i>
                                        <p>مدیریت فهرست ها</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview {{ active_dropdown(['log.visits']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-clipboard"></i>
                                <p>
                                    گزارشات
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview sub-menu" {{ active_list(['log.visits']) }}>
                                <li class="nav-item" {{ active_menu('log.visits') }}>
                                    <a href="{{ route('log.visits') }}" class="nav-link">
                                        <i class="fa fa-circle-o nav-icon"></i>
                                        <p>آمار بازدید</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li
                            class="nav-item has-treeview {{ active_dropdown(['reserve.part', 'reserve.plan', 'reserve.order']) }}">
                            <a href="#" class="nav-link main-menu">
                                <i class="nav-icon fa fa-clipboard"></i>
                                <p>
                                    رزرو آنلاین
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview sub-menu"
                                {{ active_list(['reserve-part.index', 'reserve-plan.index', 'reserve-order.index']) }}>
                                <li class="nav-item" {{ active_menu('reserve-part.index') }}>
                                    <a href="{{ route('reserve-part.index') }}" class="nav-link">
                                        <i class="fa fa-th-list text-warning nav-icon"></i>
                                        <p>سانس ها</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('reserve-plan.index') }}>
                                    <a href="{{ route('reserve-plan.index') }}" class="nav-link">
                                        <i class="fa fa-edit text-warning nav-icon"></i>
                                        <p>برنامه ریزی</p>
                                    </a>
                                </li>
                                <li class="nav-item" {{ active_menu('reserve-order.index') }}>
                                    <a href="{{ route('reserve-order.index') }}" class="nav-link">
                                        <i class="fa fa-edit text-warning nav-icon"></i>
                                        <p>گزارشات</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item has-treeview">
                            <a href="{{ route('project.index') }}" class="nav-link main-menu">
                                <i class="nav-icon fa fa-dashboard"></i>
                                <p>مدیریت پروژه ها</p>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</aside>
