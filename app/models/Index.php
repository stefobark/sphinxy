<?php

class Index extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	public function conf_index()
    {
        return $this->belongsTo('ConfIndex');
    }
    
	// Don't forget to fill this array
	protected $fillable = [];

}
