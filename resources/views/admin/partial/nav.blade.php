<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link">خانه</a>
        </li>
        {{-- @if ($slug=auth()->user()->slug())
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('enterSite', $slug) }}" target="_blank" class="nav-link">ورود به سایت</a>
            </li>
        @endif --}}
    </ul>
    <!--form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form-->
    <ul class="navbar-nav mr-auto">

        <!--li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments-o"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 ml-3 img-circle">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                حسام موسوی
                                <span class="float-left text-sm text-danger"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">با من تماس بگیر لطفا...</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                پیمان احمدی
                                <span class="float-left text-sm text-muted"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">من پیامتو دریافت کردم</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i> 4 ساعت قبل</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle ml-3">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                سارا وکیلی
                                <span class="float-left text-sm text-warning"><i class="fa fa-star"></i></span>
                            </h3>
                            <p class="text-sm">پروژه اتون عالی بود مرسی واقعا</p>
                            <p class="text-sm text-muted"><i class="fa fa-clock-o mr-1"></i>4 ساعت قبل</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">مشاهده همه پیام‌ها</a>
            </div>
        </li-->

        @php
            $projects = App\Models\Project::accountProjects(auth()->user()->account->id);
        @endphp
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-cubes"></i>
                <span class="badge badge-warning navbar-badge">{{ convertToPersian($projects->count()) }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">{{ convertToPersian($projects->count()) }} پروژه</span>
                <div class="dropdown-divider"></div>
                @if ($projects->count() > 0)
                    @foreach ($projects as $project)
                        <a href="{{ route('openProject', ['project_id' => $project->id]) }}" class="dropdown-item">
                            <i class="fa fa-check-circle ml-2"></i> {{ $project->title }}
                            <span class="float-left text-muted text-sm">میز کار</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                @else
                    <a href="#" class="dropdown-item">
                        <i class="fa fa-envelope ml-2"></i> هیچ پروژه ای تعریف نشده است.
                        <span class="float-left text-muted text-sm">3 دقیقه</span>
                    </a>
                @endif
                <a href="{{ route('project.index') }}" class="dropdown-item dropdown-footer">مدیریت پروژه ها</a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">
                <span class="dropdown-item dropdown-header">{{ Auth::user()->name . ' ' . Auth::user()->family }}</span>
                <div class="dropdown-divider"></div>
                <div class="dropdown-divider"></div>
                {{-- <a href="#" class="dropdown-item dropdown-footer">مشاهده همه نوتیفیکیشن</a> --}}
                <div class="dropdown-divider"></div>
                <a href="{{route('change.pass')}}" class="dropdown-item dropdown-footer">تغییر رمز</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item dropdown-footer">خروج از حساب کاربری</button>
                </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i class="fa fa-th-large"></i></a>
        </li>
    </ul>
</nav>
