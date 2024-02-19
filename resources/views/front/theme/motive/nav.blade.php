<nav class="navbar navbar-default" role="navigation">
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
                @php
                    $navItems = $navModel->getNavItems('top-nav', 0, $accountId, $projectId);
                @endphp
                @if ($navItems)
                    @foreach ($navItems as $navItem)
                        @if ($navModel->itemHasChild($navItem->id))
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $navItem->name }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    @php
                                        $childs = $navModel->getNavItems('top-nav', $navItem->parent_id, $accountId, $projectId);
                                    @endphp
                                    @if ($childs)
                                        @foreach ($childs as $child)
                                            <li><a href="{{ $child->link }}">{{ $child->name }}</a></li>
                                            <li class="divider"></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ $pageModel->getPagePermalink($slug, $navItem->link, $pageId) }}">{{ $navItem->name }}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
