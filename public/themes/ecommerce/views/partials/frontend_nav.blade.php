@foreach ($pages as $page)
    <li class="{{ Request::is($page->present()->uriWildCard) ? 'active' : '' }} {{ count($page->children) ? ($page->isChild() ? 'dropdown-submenu' : 'dropdown') : '' }}">
       
        <a href="{{ url($page->uri) }}">
            
            {{ $page->title }}

            @if (count($page->children))
                <span class="caret {{ $page->isChild() ? 'right' : '' }}"></span>
            @endif

        </a>

        @if (count($page->children))
            <ul class="dropdown-menu">
                @include('partials.frontend_nav', ['pages' => $page->children])
            </ul>
        @endif
    </li>
@endforeach

