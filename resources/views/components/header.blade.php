<header id="header">
    <nav id="navigation">
        <img id="logo" src="{{ Vite::asset('resources/icons/app/logo_white.png') }}" alt="HoornHek Logo">
        <div>
            @include('components.parts.header-main-links')
        </div>
        <div>
            @include('components.parts.header-def-links')
        </div>
    </nav>
</header>
