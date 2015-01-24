<?php

class ActionsController extends \BaseController {

	public function index()
	{
		
		$conf_id = Input::get('conf_id');
		$conf = Conf::find("$conf_id");
		$conf_title = $conf->title;
			
		return View::make('/actions', compact('conf_id', 'conf_title'));
	}

}
