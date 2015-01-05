<?php

class ConfIndex extends Eloquent {

    protected $table = 'conf_indexes';
    
    public function indexes()
    {
        return $this->hasMany('Index');
    }
	
	 public function conf()
    {
        return $this->belongsTo('Conf');
    }
}
}

?>
