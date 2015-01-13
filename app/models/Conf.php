<?php

class Conf extends Eloquent {


    public function indices()
    {
        return $this->hasManyThrough('Index', 'ConfIndex', 'index_id', 'id');
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
