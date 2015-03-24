<?php namespace App\Http\Controllers;


use App\Feed;
use DB;

class SettingsController extends Controller {

    public function showSettings()
    {
        // Primera mitad
        $feeds = Feed::all()->take(5);
        // Segunda mitad D:
        $feedsSecond = DB::table('feeds')->skip(5)->take(10)->get();


        // Debería ser solo una lista. workaround mientras no
        // se arregla el front-end.

        return view('settings', ['feeds' => $feeds, 'feedsSecond' => $feedsSecond]);
    }

}
