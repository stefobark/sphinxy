<?php
class Indexer extends Eloquent {

protected $fillable = array('mem_limit','max_file_field_buffer','max_iops', 'max_iosize', 'max_xmlpipe2_field', 'write_buffer', 'on_file_field_error', 'lemmatizer_cache');

public function conf()
    {
        return $this->belongsTo('Conf');
    }
    
    
    
}
