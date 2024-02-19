<nav class="navbar navbar-default" role="navigation">
    @php
        $navItems = $navModel->getNavItems('top-nav', $accountId, $projectId);
    @endphp
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">تبدیل ناوبری</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><h1>Motive<span> Mag</span></h1></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @if ($navItems)
                    @foreach ($navItems as $navItem)
                        <li><a href="{{ $navItem->link }}">{{ $navItem->name }}</a></li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
