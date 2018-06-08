<?php

namespace App\Http\Controllers\Map;

use App\Http\Controllers\Controller;
use App\Map;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    /**
     * Lista todos os mapas na API
     * @param 
     * 
     * @return \Illuminate\Http\Response::json 
     */
    public function index()
    {
        $maps = Map::all();

        return view('maps.index')->with('maps', $maps);
        //return redirect()->json($map);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $map = new Map;
        $datetime = Carbon::now();

        $map->name = $request->name;
        $map->description = $request->description;
        
        if($request->hasFile('geojson'))
        {
            $path = Storage::putFileAs('maps', $request->file('geojson'), $request->name . '.json');
            $contents = Storage::get($path);

            $map->geojson_url = $path;
        }

        $map->created_at = $datetime;

        $map->save();

        return $this->index();
    }

    public function show(Map $map)
    {
        $geojson = Storage::get($map->geojson_url);
        //dd($geojson);
        return view('maps.show')->with('map', $map)->with('geojson', $geojson);
    }


    public function getMapJson(Map $map)
    {
        $geojson = Storage::get($map->geojson_url);
        //dd($geojson);
        return $geojson;
    }

    
}

