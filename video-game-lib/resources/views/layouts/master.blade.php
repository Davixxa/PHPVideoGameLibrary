<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    @vite(['resources/css/groupstyle.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <div class="menubar content_placement">
        <div class="logo_placemenet content_placement">
            <img id=logo src="{{ asset('LOGO.png') }}" data-route="{{ route('showIndex') }}">
        </div>
        <div class="search_placement content_placement">
            <input id="searchbar" type="text" name="name"><br>
        </div>
        <div class="profile_placement content_placement">
            <select id="languageselection" name="LANGUAGE" class="profile content_placement">
                <option value="DANSK" href="locale/dk">DANSK</option>
                <option value="ENGLISH" href="locale/en">ENGLISH</option>
                <option value="DEUTSCH" href="locale/de">DEUTSCH</option>
            </select>
            <button class="profile content_placement" id="newsButton" data-route="{{ route('showNews') }}">
                NEWS
            </button>
            <button class="profile content_placement" id="profileButton" data-route="{{ route('showAccount') }}">
                PROFILE
            </button>
        </div>
    </div>
</header>

<nav class="category_placement content_placement">
    <div class="category widetub_bar content_placement">
        <button class="category_buttons {{ $selectedCategory === 'strategy' ? 'category_selected' : '' }}" id="strategyButton" data-route="{{ route('showStrategy') }}">
            STRATEGY
        </button>
        <button class="category_buttons {{ $selectedCategory === 'racing' ? 'category_selected' : '' }}" id="drivingRacingButton" data-route="{{ route('showDrivingRacing') }}">
            RACING
        </button>
        <button class="category_buttons {{ $selectedCategory === 'action' ? 'category_selected' : '' }}" id="actionButton" data-route="{{ route('showAction') }}">
            ACTION
        </button>
        <button class="category_buttons {{ $selectedCategory === 'shooting' ? 'category_selected' : '' }}" id="shootingButton" data-route="{{ route('showShooting') }}">
            SHOOTING
        </button>
        <button class="category_buttons {{ $selectedCategory === 'puzzle' ? 'category_selected' : '' }}" id="puzzleButton" data-route="{{ route('showPuzzle') }}">
            PUZZLE
        </button>
    </div>
</nav>

<main>
    @yield('content')
</main>

</body>
</html>
