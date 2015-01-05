<?php

class Conf extends Eloquent {

    public function conf_source()
    {
        return $this->hasOne('ConfSource');
    }
    
     public function conf_index()
    {
        return $this->hasOne('ConfIndex');
    }
    
     public function searchd()
    {
        return $this->hasOne('Searchd');
    }
     public function indexer()
    {
        return $this->hasOne('Indexer');
    }

}

?>
