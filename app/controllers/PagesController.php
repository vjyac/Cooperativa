<?php

class PagesController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

				$title = "Paginas";
        $pages = DB::table('pages')
													->orderBy('id', 'desc')->paginate(10);
        return View::make('pages.index', array('pages' => $pages, 'title' => $title));

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// var_dump(Input::All());
		// die;
		//

		// 'categorias_id' => 'exists:rubros,id'

		$rules = [
			'page' => 'required',
			'html' => 'required',
			'url_seo' => 'required',
		];


		if (! Page::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Page::$errors);

		}

		$page = new Page;

		$page->page = Input::get('page');
		$page->html = Input::get('html');
		$page->url_seo = Input::get('url_seo');
		$page->activo = Input::get('activo');
		$page->mostrar_menu = Input::get('mostrar_menu');


		$page->save();

		return Redirect::to('/pages');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($url_seo)
	{

		$page = DB::table('pages')->where('url_seo', '=', $url_seo)->first();;

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
		$page = Page::find($id);
		$title = "Editar Pagina";

        return View::make('pages.edit', array('title' => $title, 'page' => $page));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{

		$page = Page::find($id);


		$rules = [
			'page' => 'required',
			'html' => 'required',
			'url_seo' => 'required',
		];


		if (! Page::isValid(Input::all(),$rules)) {

			return Redirect::back()->withInput()->withErrors(Page::$errors);

		}

		$page->page = Input::get('page');
		$page->html = Input::get('html');
		$page->url_seo = Input::get('url_seo');
		$page->activo = Input::get('activo');
		$page->mostrar_menu = Input::get('mostrar_menu');


		$page->save();

		return Redirect::to('/pages');

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


		$page = Page::find($id)->delete();

		return Redirect::to('/pages');
	}





}
