<div class="container text-center mt-3">
    <div class="col">
        <a href="{{ route('showIndex') }}" class="text-white text-decoration-none display-3 row"><strong>GAME<i>X</i></strong></a>
        <div class="row">
            <div class="mt-2">
                @auth
                    @if(auth()->user()->isAdmin())
                        <p class="text-white">You are currently logged in as admin.</p>
                    @elseif(auth()->user()->isUser())
                        <p class="text-white">You are currently logged in as a user.</p>
                    @else
                        <p class="text-white">You are currently logged in as a guest.</p>
                    @endif
                @else
                    <p class="text-white">You are currently logged out and browsing as a guest.</p>
                @endauth
            </div>
            <div>
                <a href="{{ route('showAccount') }}" class="btn btn-outline-light" type="button">
                    ACCOUNT
                </a>
                @auth
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('admins.showGames') }}" class="btn btn-outline-light" type="button">
                            EDIT GAMES AND CATEGORIES
                        </a>
                    @elseif(auth()->user()->isUser())
                        <a href="{{ route('users.showGames') }}" class="btn btn-outline-light" type="button">
                            EDIT GAMES
                        </a>
                    @endif
                    <a href="{{ route('showAccount') }}" class="btn btn-outline-light" type="button">
                        LANGUAGE
                    </a>
                @endauth
            </div>
        </div>
    </div>
</div>
