<?php

class ArchivosController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id, $padre)
	{

				$articulo = DB::table('articulos')->where('id', '=', $id)->first();
        $archivos = DB::table('archivos')
												->where('padre_id', '=', $id)
												->where('padre', '=', $padre)
												->get();
        $title = "Archivos";
        return View::make('archivos.index', array('title' => $title, 'archivos' => $archivos, 'articulo' => $articulo, 'padre' => $padre, 'padre_id' => $id));

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	    $file = Input::file('file');

			$filename = $file->getClientOriginalName();

	    if($file) {

				$filename = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();

				$destinationPath = public_path() . '/uploads/original/';
				$destinationPath_big = public_path() . '/uploads/big/';
				$destinationPath_crop = public_path() . '/uploads/crop/';


				$upload_success = Input::file('file')->move($destinationPath, $filename);

	        if ($upload_success) {

									$image = Image::make($destinationPath . $filename)->resize(800, null, true)->save($destinationPath_big . $filename);
									$image = Image::make($destinationPath . $filename)->resize(640, null, true)->crop(400, 300, true)->save($destinationPath_crop . $filename);

									File::delete($destinationPath . $filename);

									$arch = new Archivo;

									$arch->archivo = $filename;
									$arch->descripcion = Input::get('descripcion','');
									$arch->padre_id = Input::get('padre_id');
									$arch->padre = Input::get('padre');

									$arch->save();

	    }


return Redirect::to('/articulos/ver');












}







	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$archivo = Archivo::find($id);
		$articulos_id = $archivo->articulos_id;

		$filename = $archivo->archivo;

		$archivo = Archivo::find($id)->delete();


		$destinationPath_big = public_path() . '/uploads/big/';

		File::delete($destinationPath_big . $filename);

		return Redirect::to('/articulos/' . $articulos_id . '/archivos');


	}



}
