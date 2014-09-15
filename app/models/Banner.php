<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Banner extends Eloquent {

		protected $table = 'banners';

		protected $fillable = ['banners'];


	public static $errors;

	public static function isValid($data, $rules)
		{

			$validation = Validator::make($data, $rules);

			if ($validation->passes()) return true;

				static::$errors = $validation->messages();

			return false;
		}




/**
* Remove the specified resource from storage.
*
* @param  int  $id
* @return Response
*/
public function imprimir($posicion)
{

			$banner = DB::table('banners')
									->where('posicion', '=', $posicion)
									->orderBy('visitas', 'asc')
									->first();
			$id = $banner->id;

			$banner = Banner::find($id);

			$banner->visitas++;
			$banner->save();

			$url = '/publicidades/' . $banner->file;

			$devolver = array ($url, $banner->link);

			return $devolver;
}






}
