<nav class="navbar navbar-default" role="navigation">
    
    @php dd($navModel->getNavItems('top-nav', $accountId, $projectId)) @endphp

    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">تبدیل ناوبری</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><h1>Motive<span> Mag</span></h1></a>
        </div>
        <!--/.navbar-header-->

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="fashion.html">اخبار روز</a></li>
                <li><a href="sports.html">ورزشی</a></li>
                <li class="dropdown">
                    <a href="entertainment.html" class="dropdown-toggle" data-toggle="dropdown">سرگرمی<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="entertainment.html">فیلم</a></li>
                        <li class="divider"></li>
                        <li><a href="entertainment.html">
                                لورم ایپسوم</a></li>
                        <li class="divider"></li>
                        <li><a href="articles.html">مقالات</a></li>
                        <li class="divider"></li>
                        <li><a href="entertainment.html">طرح نما</a></li>
                        <li class="divider"></li>
                        <li><a href="entertainment.html">
                                یک لینک بیش از هم جدا
                            </a></li>
                    </ul>
                </li>
                <li><a href="typography.html">سیاست</a></li>
                <li class="dropdown">
                    <a href="business.html" class="dropdown-toggle" data-toggle="dropdown">کسب و کار<b
                            class="caret"></b></a>
                    <ul class="dropdown-menu multi-column columns-2">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    <li><a href="business.html">طراح گرافیک</a></li>
                                    <li class="divider"></li>
                                    <li><a href="business.html">انیمیشن</a></li>
                                    <li class="divider"></li>
                                    <li><a href="business.html">بازار</a></li>
                                    <li class="divider"></li>
                                    <li><a href="business.html">بررسی</a></li>
                                    <li class="divider"></li>
                                    <li><a href="typography.html">کدهای کوتاه</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="multi-column-dropdown">
                                    <li><a href="#">ویژگی ها</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">فیلم</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">ورزشی</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">بررسی</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">حساب کاربری</a></li>
                                </ul>
                            </div>
                        </div>
                    </ul>
                </li>
                <li><a href="contact.html">تماس با ما</a></li>
                <li><a href="account.html">
                        حساب من
                    </a></li>
            </ul>
        </div>
        <!--/.navbar-collapse-->
        <!--/.navbar-->
        <!--RTL & Persian LNG & Publicer By Www.20script.ir-->
    </div>
</nav>
