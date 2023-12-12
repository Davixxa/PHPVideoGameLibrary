<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMEX/strategy</title>
    <link rel="stylesheet" href="../css/groupstyle.css">
</head>
<body>

<header>
    <div class="menubar content_placement">
        <div class="logo_placemenet content_placement">
            <img id=logo src="LOGO.png">
        </div>
        <div class="search_placement content_placement">
            <input id="searchbar" type="text" name="name"><br>
        </div>
        <div class="profile_placement content_placement">
            <select name="LANGUAGE" class="profile content_placement">
                <option value="DANSK" href="locale/dk">DANSK</option>
                <option value="ENGLISH" href="locale/en">ENGLISH</option>
                <option value="DEUTSCH" href="locale/de">DEUTSCH</option>
            </select>
            <button class="profile content_placement">
                <a @lang('public.NEWS')>NEWS</a>
            </button>
            <button class="profile content_placement">
                <a @lang('public.PROFILE')>PROFILE</a>
            </button>
        </div>
    </div>
</header>

<nav class="category_placement content_placement">
    <div class="category widetub_bar content_placement">
        <button class="category_buttons">
            STRATEGY
        </button>
        <button class="category_buttons">
            DRIVING & RACING
        </button>
        <button class="category_buttons">
            ACTION
        </button>
        <button class="category_buttons">
            SHOOTING
        </button>
        <button class="category_buttons">
            THINKING
        </button>
    </div>
</nav>

{{--<?php--}}
{{--$gameboxtext = {"Test1","Test2","Test3","Test4","Test5"};--}}
{{--?>--}}
{{--@foreach ($gameboxtext as $text){--}}
{{--<p>{{$text}}</p>--}}
{{--}@endforeach--}}

<section class="gamebox-placement content_placement">
    //array(id,name,image.path,rating_scalar,user.name)
    <?php
    $gamebox_content = (
    array(1, "name1","EXAMPLE.png",5,"bullshit"),
    array(2, "name2","EXAMPLE.png",6,"bullshit"),
    array(3, "name3","EXAMPLE.png",7,"bullshit"),
    array(4, "name4","EXAMPLE.png",8,"bullshit"),
    array(5, "name5","EXAMPLE.png",7,"bullshit"),
    array(6, "name6","EXAMPLE.png",8,"bullshit")
    );

    foreach($gamebox_content as $game){ ?>
    {{--        <a href="gamepage.blade.php?gamename=<?=$game[1]?>" >--}}
    {{--        <img src="<?=$game[2]?>" >--}}

    <div class="gamebox content_placement">
        <a href="gamepage.blade.php?gamename=<?=$game[1]?>" class="gamebox_links">
            <img src="<?=$game[2]?>" class="game_image">
            <div class="game_name_placement content_placement">
                <p>
                        <?=$game[1]?>
                </p>
            </div>
        </a>
    </div>

    <?php } ?>
</section>

</body>
</html>
