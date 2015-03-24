<?php namespace App\Http\Controllers;

use App\Feed;
use App\NewsItem;
use DB;

class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //orderBy('date', 'desc')->take(20)->
        //Book::with('author')->get()
        $news = NewsItem::with('feed')->orderBy('date', 'desc')->take(20)->get();

        return view('admin.index', ['news' => $news]);

        return view('admin.index');
    }



}
