<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GAMEX/account</title>
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
            <button class="profile content_placement">
                PROFILE
            </button>
        </div>
    </div>
</header>

<nav>
    <div class="category_placement content_placement textstyle textstyle">
        <div class="widetub_bar profile_textbar content_placement">
            <div class="loginbutton_left content_placement">
                <button class="profile_buttons">
                    BACK
                </button>
            </div>
            <div class="loginbutton_center content_placement textstyle">
                <p class="login_name_placement textstyle">
                    LOGIN
                </p>
            </div>
            <div class="loginbutton_right content_placement">
                <button class="profile_buttons">
                    CREATE ACCOUNT
                </button>
            </div>
        </div>
    </div>
</nav>

<section>
    <div class="category_placement content_placement textstyle">
        <div class="search_placement login_box content_placement textstyle">
            <div class="logintext_placement1 textstyle">
                <p>
                    Please enter your Login Information here.
                </p>
                <form action="" method="post">
                    <div class="login_information">
                        <div class="login_label_layout">
                            <label class="login_label">Username</label>
                        </div>
                        <div class="login_access_layout">
                            <input class="login_access" type="text" name="username"><br>
                        </div>
                    </div>
                    <div class="login_information">
                        <div class="login_label_layout">
                            <label class="login_label">Password</label>
                        </div>
                        <div class="login_access_layout">
                            <input class="login_access" type="password" name="password"><br>
                        </div>
                    </div>
                    <label class="logintext_placement2 content_placement">
                        Click Login to Continue your Stay, or click above to Create Account.
                    </label>
                    <div class="logintext_placement2 content_placement">
                        <input class="login_buttons" type="submit" name="create_account" value="LOGIN">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

</body>
</html>
