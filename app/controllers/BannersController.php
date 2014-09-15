<?php

class BannersController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$title = "Banners";
        $banners = DB::table('banners')
													->orderBy('id', 'desc')->paginate(10);
        return View::make('banners.index', array('banners' => $banners, 'title' => $title));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('banners.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{


		$rules = [
			'empresa' => 'required',
			'file' => 'required',
		];


		if (! Banner::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Banner::$errors);

		}

		$banner = new Banner;

		$banner->empresa = Input::get('empresa');
		$banner->file = Input::get('file');
		$banner->link = Input::get('link');
		$banner->posicion = Input::get('posicion');
		$banner->activo = Input::get('activo');


		$banner->save();

		return Redirect::to('/banners');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($url_seo)
	{

		$page = DB::table('banners')->where('url_seo', '=', $url_seo)->first();;

		$id = $page->id;

		$page = Page::find($id);

		$page->visitas++;
		$page->save();

		// show the view and pass the nerd to it

		return View::make('pages.show', array(
											'page' => $page));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$banner = Banner::find($id);
		$title = "Editar Banner";

        return View::make('banners.edit', array('title' => $title, 'banner' => $banner));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$banner = Banner::find($id);


		$rules = [
			'empresa' => 'required',
			'file' => 'required',
		];


		if (! Banner::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Banner::$errors);

		}

		$banner->empresa = Input::get('empresa');
		$banner->file = Input::get('file');
		$banner->link = Input::get('link');
		$banner->posicion = Input::get('posicion');
		$banner->activo = Input::get('activo');


		$banner->save();

		return Redirect::to('/banners');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$input = Input::all();


		$banner = Banner::find($id)->delete();

		return Redirect::to('/banners');
	}






}
