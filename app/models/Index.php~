<?php

class Index extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		// 'title' => 'required'
	];

	public function conf_index()
    {
    		
        return $this->belongsToMany('ConfIndex', 'index_id');
    }
    
	// Don't forget to fill this array
	protected $fillable = [];

}
