<?php

class ContactosController extends BaseController {


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{


        $contactos = DB::table('contactos')->orderBy('id', 'desc')->paginate(20);
        $title = "Contactos";
        return View::make('contactos.index', array('title' => $title, 'contactos' => $contactos));
	}




	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('contactos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		// $rules = [
		// 	'categorias_id' => 'exists:rubros,id'
		// ];

		//
		// if (! contacto::isValid(Input::all(),$rules)) {
		//
		// 	return Redirect::back()->withInput()->withErrors(contacto::$errors);
		//
		// }

		$contacto = new contacto;

		$contacto->nombre = Input::get('nombre','');
		$contacto->email = Input::get('email','');
		$contacto->telefono = Input::get('telefono','');
		$contacto->contacto = Input::get('contacto','');

		$contacto->save();

		return Redirect::to('/');

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

		$contacto = contacto::find($id);
		$categoria = Categoria::find($contacto->categorias_id);

		// show the view and pass the nerd to it

		return View::make('contactos.show', array('contacto' => $contacto, 'categoria' => $categoria));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$contacto = contacto::find($id);
		$title = "Editar contacto";

        return View::make('contactos.edit', array('title' => $title, 'contacto' => $contacto));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{



		$contacto = contacto::find($id);

		// $rules = [
		// 	'contacto' => 'required|unique:contactos,contacto,' . $id,
		// 	'rubros_id' => 'exists:rubros,id',
		// 	'proveedors_id' => 'exists:proveedors,id',
		// 	'precio_base' => 'required|numeric',
		// 	'utilidad' => 'required|numeric',
		// 	'precio_publico' => 'required|numeric',
		// 	'iva' => 'required|numeric'
		// ];
		//
		//
		//
		// if (! contacto::isValid(Input::all(),$rules)) {
		//
		// 	return Redirect::back()->withInput()->withErrors(contacto::$errors);
		//
		// }


		$contacto->contacto = Input::get('contacto');
		$contacto->categorias_id = 1;
		$contacto->texto = Input::get('texto');

		$contacto->save();

		return Redirect::to('/contactos/ver');


	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$contacto = contacto::find($id)->delete();

		return Redirect::to('/contactos');
	}


    public function search(){

        $term = Input::get('term');

        $contactos = DB::table('contactos')->where('contacto', 'like', '%' . $term . '%')->get();

        $adevol = array();

        if (count($contactos) > 0) {

            foreach ($contactos as $contacto)
                {
                	$precio_sin_iva = $contacto->precio_publico / (($contacto->iva / 100) + 1);

                    $adevol[] = array(
                        'id' => $contacto->id,
                        'value' => $contacto->contacto,
                        'precio' => $precio_sin_iva,
                        'iva' => $contacto->iva,
                    );
            }
        } else {
                    $adevol[] = array(
                        'id' => 0,
                        'value' => 'no hay coincidencias para: ' .  $term,
                        'precio' => 0,
                        'iva' => 0,
                    );
        }

        return json_encode($adevol);


    }



}
