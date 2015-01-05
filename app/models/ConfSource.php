<?php

class ConfSource extends Eloquent {

    protected $table = 'conf_sources';


	public function source()
    {
        return $this->hasMany('Source');
    }
    
    public function conf()
    {
        return $this->belongsTo('Conf');
    }
}

?>
