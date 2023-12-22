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
        if(Session::get("locale")!=null){
            App::setLocale(Session::get("locale"));
        }else{
            switch(Session::get("locale")){

                case "en":
                Session::put("locale","en"));
                App::setLocale(Session::get("locale"));
                break;

                case "dk":
                Session::put("locale","dk"));
                App::setLocale(Session::get("locale"));
                break;

                case "de":
                Session::put("locale","de"));
                App::setLocale(Session::get("locale"));
                break;
            }
        }
        return $next($request);
    }

}

//WHAT HAVE I LEARNED
//Localization Middleware is where we are able to handle the incoming and outcoming request like the Localization Controller.
//But here we have specified our locale-language by using the setLocale defined from the earlier file: Localization Controller.
//Source-URL: https://www.youtube.com/watch?v=e6ccPgI8aHk&t=43s

