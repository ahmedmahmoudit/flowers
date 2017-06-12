<div class="c-layout-breadcrumbs-1 c-fonts-uppercase c-fonts-bold">
    <div class="container">
        <div class="c-page-title c-pull-left">
            <h3 class="c-font-uppercase c-font-sbold">{{ $title }}</h3>
            @if(isset($sub))
                <h4 class="">{{ $sub }}</h4>
            @endif
        </div>
        @if(isset($nav))
            <ul class="c-page-breadcrumbs c-theme-nav c-pull-right c-fonts-regular">
                <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                <li>/</li>
                {{ $slot }}
            </ul>
        @endif
    </div>
</div>