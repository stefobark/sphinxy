<?php

class ConfsController extends \BaseController {

	public function index()
	{
		
		$confs = Conf::all();
		
		return View::make('confs.index', compact('confs'));
	}


	public function create()
	{

		return View::make('confs.new');
	
	}

	public function store()
	{
	
		if(Input::exists('conf_id'))
		{
		
			$conf_id = Input::get('conf_id');
			$conf = Conf::find("$conf_id");
			$conf_title = $conf->title;
			
			return View::make('indices/new', compact('conf_id', 'conf_title'));

		} else {

			$conf = new Conf;
			$conf->title = Input::get('conf_title');
			$conf->save();
			
			$conf_id = $conf->id;
			$conf_title = $conf->title;
			
			return View::make('indices/new', compact('conf_id', 'conf_title'));
		}
		
	}


	public function saveConf() 
	{
	
		$conf_id = Input::get('conf_id');
			$conf = Conf::find("$conf_id");
			$conf_title = $conf->title;
	
	$passSources = DB::table('sources')->join('conf_sources', 'sources.id', '=', 'source_id')->where('conf_id', '=', $conf_id)->get();
		
		$sourceContent = '';
		
		foreach($passSources as $source){
			$sourceContent .= "source $source->s_name \n{\n";
				if(empty($source->s_name)){
					$sourceContent .= "MUST NAME SOURCE!!!";
				}
			foreach($source as $sKey => $sValue){
					if(!empty($sValue) AND $sKey != 'id' AND $sKey != 'created_at' AND $sKey != 'updated_at' AND $sKey != 's_name' AND $sKey != "source_id" AND $sKey != "conf_id"){
						
						$sourceContent .= "$sKey = $sValue \n";
						
					}
				
			}
			$sourceContent .= "} \n\n";
		}
		
		$path = public_path("$conf_title.conf");
    	File::put($path, $sourceContent);
		
		$passIndices = DB::table('indices')->join('conf_indexes', 'indices.id', '=', 'index_id')->where('conf_id', '=', $conf_id)->get();
		
		$indexContent = '';
		
		foreach($passIndices as $index){
			$indexContent .= "index " . $index->i_name . "\n{\n";
				if(empty($index->i_name)){
					$indexContent .= "MUST NAME INDEX!!!";
				}
				foreach ($index as $key => $value){
					if(!empty($value) AND $key != 'id' AND $key != 'created_at' AND $key != 'updated_at' AND $key != 'i_name' AND $key != 'index_id' AND $key != 'conf_id'){
						$indexContent .= $key . '=' . $value . "\n";
					}
				}
				$indexContent .= "} \n\n";
		}
		
		$path = public_path("$conf_title.conf");
    	File::append($path, $indexContent);
	
		
		$passSearchds = DB::table('searchds')->join('confs', 'searchds.id', '=', 'searchd_id')->where('confs.id', '=', $conf_id)->get();
		
		$searchdContent = "searchd \n{\n";
		foreach ($passSearchds[0] as $sdKey => $sdValue){
			if(!empty($sdValue) AND $sdKey != 'title' AND $sdKey != 'searchd_id' AND $sdKey != 'indexer_id' AND $sdKey != 'id' AND $sdKey != 'created_at' AND $sdKey != 'updated_at'){
						$searchdContent .= "$sdKey = $sdValue \n";
					}
			}
			$searchdContent .= "}\n\n";
		
		$path = public_path("$conf_title.conf");
    	File::append($path, $searchdContent);
		
		$passIndexers = DB::table('indexers')->join('confs', 'indexers.id', '=', 'indexer_id')->where('confs.id', '=', $conf_id)->get();
		
		$indexerContent = "indexer \n{\n";
			foreach ($passIndexers[0] as $iKey => $iValue){
				if(!empty($iValue) AND $iKey != 'title' AND $iKey != 'searchd_id' AND $iKey != 'indexer_id' AND $iKey != 'id' AND $iKey != 'created_at' AND $iKey != 'updated_at'){
					$indexerContent .= "$iKey = $iValue \n";
				}
			}
		$indexerContent .= "}\n\n";
		
		$path = public_path("$conf_title.conf");
    	File::append($path, $indexerContent);
    	
    	$allContent = $sourceContent . $indexContent . $searchdContent . $indexerContent;
    	
    	return View::make('confs.save', compact('conf_id', 'conf_title', 'allContent', 'passIndexers', 'passIndices', 'passSearchds', 'passSources'));
		
	}

}
