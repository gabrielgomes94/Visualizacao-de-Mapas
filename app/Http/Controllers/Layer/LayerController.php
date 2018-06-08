<?php

namespace App\Http\Controllers\Layer;

use App\Http\Controllers\Controller;
use App\Layer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayerController extends Controller
{
    public function get(Layer $layer)
    {
    	//dd($layer);


    	//$original_data = DB::table($layer->schema . "." . $layer->table)
    					
    	//				->get()->pluck('st_asgeojson');
    	//dd($original_data;

    	$properties = str_getcsv($layer->properties);
    	//dd($properties);


    	$query = DB::table($layer->schema . "." . $layer->table)
    				->select(DB::raw($layer->properties . ', ST_AsGeoJSON("geom") as geom'))
    				->get();

    	// dd($query);
    	$features = array();
    	foreach($query as $key => $value)
    	{
    		dd('geometry : ' . $value->geom);
    		$features[] = 
    			array(    				
					'type' => 'Feature',
					'properties' => $this->getProperties($properties, $value),
					'geometry' => $value->geom    				
    			);
    	}

    	$allfeatures = 
    		array('type' => 'FeatureCollection', 
				'name' => $layer->table,
				"crs" => array(
							"type" => "name",
							"properties" => array(
								"name" => "urn:ogc:def:crs:OGC:1.3:CRS84"
							)
						),
    			'features' => $features);
    	//dd($features->toJson());
    	//$features = json_encode($features);
    	//dd($features);
    	return response()->json($allfeatures);


    }

    private function getProperties($properties, $value)
    {
    	$array = array();
    	foreach($properties as $property)
    	{    		
    		$array[$property] = $value->$property;
    	}    	
    	return $array;

    }
}
