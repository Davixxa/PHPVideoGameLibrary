<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMEX/index</title>
    @vite(['resources/css/groupstyle.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <div class="menubar content_placement">
        <div class="logo_placemenet content_placement">
            <img id=logo src="{{ asset('LOGO.png') }}">
        </div>
        <div class="search_placement content_placement">
            <input id="searchbar" type="text" name="name"><br>
        </div>
        <div class="profile_placement content_placement">
            <button class="profile content_placement">
                NEWS
            </button>
            <button class="profile content_placement" >
                PROFILE
            </button>
        </div>
    </div>
</header>

<nav class="category_placement content_placement">
    <div class="category widetub_bar content_placement">
        <button class="category_buttons" id="strategyButton" data-route="{{ route('showStrategy') }}">
            STRATEGY
        </button>
        <button class="category_buttons" id="drivingRacingButton" data-route="{{ route('showDrivingRacing') }}">
            DRIVING & RACING
        </button>
        <button class="category_buttons" id="actionButton" data-route="{{ route('showAction') }}">
            ACTION
        </button>
        <button class="category_buttons" id="shootingButton" data-route="{{ route('showShooting') }}">
            SHOOTING
        </button>
        <button class="category_buttons" id="thinkingButton">
            THINKING
        </button>
    </div>
</nav>

<-- ? -->


<section class="gamebox-placement content_placement">
    @foreach ($games as $game)
    <div class="gamebox content_placement">
        <a href="{{ $game->link }}" class="gamebox_links">
        <img src="{{ asset($game->image) }}" class="game_image">
            <div class="game_name_placement content_placement">
            <p>
                {{ $game->name }}
            </p>
            </div>
        </a>
    </div>
    @endforeach
  </section>



</body>
</html>