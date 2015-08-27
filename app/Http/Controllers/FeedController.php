<?php namespace App\Http\Controllers;

use App\Feed;
use App\NewsItem;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use FastFeed\Factory;
use FastFeed\Parser\RSSParser;
use FastFeed\Processor\RemoveStylesProcessor;
use FastFeed\Processor\StripTagsProcessor;
use Illuminate\Support\Str;

use Validator, Input, Redirect, Session;


use DB;

class FeedController extends Controller {

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function showSingleFeed($slug)
    {
        $feed = Feed::where('slug', '=', $slug)->firstOrFail();
        return view('feed', ['feed' => $feed]);
    }

	/**
	 * Display a listing of Feeds.
	 *
	 * @return Response
	 */
	public function index()
	{
		$feeds = Feed::all();

		return view('admin.feeds', ['feeds' => $feeds]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.feeds_create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// Validate
        $rules = array(
            'title'       => 'required',
            'feed_url'      => 'required|url'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('admin/feeds/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            // store
            $feed = new Feed();
            $feed->title = Input::get('title');
            $feed->feed_url = Input::get('feed_url');
            $feed->website = Input::get('website');
            $feed->description = Input::get('description');
            $feed->slug = Str::slug(Input::get('title'));
            $feed->save();

            // redirect
            Session::flash('message', 'Fuente de noticias creada con éxito');
            return Redirect::to('admin/feeds');
        }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return "showing " . $id;
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "editing " . $id;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getNews()
	{
        $enabledSources = Input::get('sources');

        if (sizeof($enabledSources) > 0) {
            $news = NewsItem::with('feed')
                          ->whereIn('feed_id', $enabledSources)
                          ->orderBy('date', 'desc')
                          ->take(100)
                          ->get();
        }
        else{
            $news = NewsItem::with('feed')
                          ->orderBy('date', 'desc')
                          ->take(100)
                          ->get();
        }

		
        return $news;
	}

	public static function goFetch()
	{

		$sources = Feed::all();

		$report = array();

		foreach ($sources as $num => $feed) {

			$fastFeed = Factory::create();
			$fastFeed->addFeed($feed->title, $feed->feed_url);

			$news = $fastFeed->fetch($feed->title);

			foreach ($news as $newsItem) {

                // No thanks...
                if (strpos($newsItem->getSource(), 'tvshow') !== false // TVShow
				 	|| strpos($newsItem->getIntro(), 'Horóscopo') !== false // Horóscopos de La República,
					|| strpos($newsItem->getIntro(), 'De nuestro Recetario') !== false) { // Recetario de La República
                    continue;
                }

                // Check against last 100
		    	$duplicate = $feed->news()
		    			 ->where('title', 'LIKE', '%' . $newsItem->getName() . '%')
                         ->take(100)
		    			 ->first();

				if (!$duplicate) {

					if ( $newsItem->getDate() && ($newsItem->getDate() < new \DateTime()) ) {
						$date = $newsItem->getDate()->format('Y-m-d H:i');
					}
					else{
						$d = new \DateTime();
						$date = $d->format('Y-m-d H:i');
					}

					$report[] = $newsItem;

                    $intro = trim(strip_tags($newsItem->getIntro(), '<p></p><br>'));
                    $intro = preg_replace('/La entrada (.*) aparece primero en Diario La República\./i', '', $intro);
                    if (strlen($intro) > 350) {
                        $intro = str_limit($intro, $limit = 350, $end = '...');
                    }

					$newsToInsert = new NewsItem([
				    	'title' 		=> $newsItem->getName(),
				    	'intro'   		=> $intro,
				    	'permalink'		=> $newsItem->getSource(),
				    	'date'			=> $date
					]);

					$feed->news()->save($newsToInsert);
				}

			}
		}

		

		return view('admin.fetch_report', ['news' => $report]);
	}

}
