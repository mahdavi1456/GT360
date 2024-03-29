<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">تبدیل ناوبری</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=""><h1>{{ $settingModel->getSetting('title', $accountId, $projectId) }}</h1></a>
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
                                        $childs = $navModel->getNavItems('top-nav', $navItem->id, $accountId, $projectId);
                                    @endphp
                                    @if ($childs)
                                        @foreach ($childs as $child)
                                            <li><a href="{{ $child->getLink($slug) }}" target="{{ $child->target }}" rel="{{ $child->rel }}">{{ $child->name }}</a></li>
                                            <li class="divider"></li>
                                        @endforeach
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ $navItem->getLink($slug) }}" target="{{ $navItem->target }}" rel="{{ $navItem->rel }}">{{ $navItem->name }}</a></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</nav>
