<?php

class Searchd extends \Eloquent {

	public function conf()
    {
        return $this->belongsTo('Conf');
    }

}
