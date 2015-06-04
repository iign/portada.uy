<?php namespace App\Http\Controllers;

use App\NewsItem;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;

class NewsItemController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$q = Input::get('q');
		$news = NewsItem::with('feed')
			    ->where('title', 'LIKE', "%$q%")
			    ->orWhere('intro', 'LIKE', "%$q%")
			    ->orderBy('date', 'desc')
				->paginate(50);
		return view('admin.news', ['news' => $news, 'query' => $q]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return "hey new";
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return "hey edit";
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
		$newsItem = NewsItem::find($id);
		$newsItem->delete();

		return redirect('admin/news')->withFlashMessage('Noticia eliminada.');
	}

}
