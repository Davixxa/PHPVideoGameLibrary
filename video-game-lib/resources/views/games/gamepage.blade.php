<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMEX/gamepage</title>
    @vite(['resources/css/groupstyle.css', 'resources/js/app.js'])
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
            <button class="profile content_placement">
                NEWS
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
                PROFILE
            </button>
        </div>
    </div>
</header>

<nav>
    <div class="category_placement content_placement textstyle textstyle">
        <div class="widetub_bar profile_textbar content_placement">
            <div class="loginbutton_center content_placement textstyle">
                <p class="login_name_placement textstyle">
                    AGE OF WAR
                </p>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="gameinfobox_placement content_placement1">
        <div class="login_box content_placement1">
            <img class="game_wallpaper gamewallpaper_placement" src="age_of_war.png">
            <table class="tableinfo">
                <tr>
                    <th>Name</th>
                    <th>Indsæt værdi</th>
                </tr>
                <tr>
                    <th>Platform</th>
                    <th>Indsæt værdi</th>
                </tr>
                <tr>
                    <th>Publish Date</th>
                    <th>Indsæt værdi</th>
                </tr>
                <tr>
                    <th>Game Type</th>
                    <th>Indsæt værdi</th>
                </tr>
                <tr>
                    <th>Developers</th>
                    <th>Indsæt værdi</th>
                </tr>
                <tr>
                    <th>Description</th>
                    <th>Lav en beskrivelse af spillet her</th>
                </tr>
            </table>
        </div>
    </div>
</section>

</body>
</html>
