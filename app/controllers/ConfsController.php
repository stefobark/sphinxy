<?php

class ConfsController extends \BaseController {

	public function store()
	{
	
		


		$conf = new Conf;
		$conf->title = Input::get('title');
		$conf->save();
		
		return View::make('indices/new')->with('conf',$conf);
	}

}
