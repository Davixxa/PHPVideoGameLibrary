<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMEX/gamepage</title>
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

<section>
    <div>

    </div>
</section>

</body>
</html>
