<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
{
    //The Handle-Method handles the request which are coming and going.
    public function handle(Request $request, Closure $next)
    {
        //This if-statement tells us that if we have selected a language, then our local-language should be the current language on the page.
        //EXAMPLE: If the local-language aka. original language is english, and we have not selected any language. Then our language should still be english.
        if(Session::get("locale")!=null){
            App::setLocale(Session::get("locale"));
        }
        //This else-statement does the same, but the difference is that we have here defined more specifically that the "en" or english is the local language.
        //So when english is selected, then the else statement would go the language-folder and see if any words are defined in english.
        else{
            Session::put("locale","en");
            App::setLocale(Session::get("locale"));
        }
        //This returns the request, that has the language-been selected.
        return $next($request);
    }

}

//WHAT HAVE I LEARNED
//Localization Middleware is where we are able to handle the incoming and outcoming request like the Localization Controller.
//But here we have specified our locale-language by using the setLocale defined from the earlier file: Localization Controller.
//Source-URL: https://www.youtube.com/watch?v=e6ccPgI8aHk&t=43s

