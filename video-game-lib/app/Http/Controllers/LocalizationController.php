namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

<!--The controller class is where we are able to authrorize the incoming and outcoming requests, whenever a ActionEvent has happened.
The LocalizationController has been created so that whenever a request occurs for changing language, then we are able to validate that request and process it through this method
-->
class LocalizationController extends Controller
{
<!--SetLang method is used to translate the already local-defined language into the other defined languages in the strings-folder.-->
    public function setLang($locale){
<!--This code enables us to set the local language from the beginning-->
        App::setLocale($locale);
        Session::put("locale",$locale);
<!--This part of the code creates a transition between the local-language and changing to the new language-->
        return redirect()->back();
    }
}

<!--COMMENT:
This code has been inspired by a Channel named Bluebird from Youtube, I found this source quite useful in terms of practicality.
The reason behind, that I used Bluebirds-Channel was because I found the "configuring the locale" chapter in laravels website to not be that quite useful.
I had trouble in understanding some of implementation of code from the laravels-website, that's why I used this one from Bluebird.
Source-URL: https://www.youtube.com/watch?v=e6ccPgI8aHk&t=43s-->

<!--WHAT HAVE I LEARNED FROM THE CODE-->
<!--The setLang-method enables the Application to translate the website, by using the already local language defined and then afterwards redirecting it to another language-->

