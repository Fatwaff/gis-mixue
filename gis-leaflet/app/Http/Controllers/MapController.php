<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polygon;


class MapController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $maps = \App\Models\Mixue::all();

        $mapFeatures = array();
        $mapFeatures['type'] = 'FeatureCollection';
        $mapFeatures['features'] = array();

        foreach ($maps as $map) {

            $polygons = Polygon::where('marker_id', $map->id)->get();

            $mapItem = array(
                'type' => 'Feature',
                'id' => $map->id,
                'properties' => array(
                    'NAMA' => $map->namacabang,
                    'ALAMAT' => $map->alamat,
                    'JAMOPERASIONAL' => $map->jam_operasional,
                    'NOTELP' => $map->no_telp,
                    'FASILITAS' => $map->fasilitas,
                    'FOTO' => $map->foto,
                ),
                'geometry' => array(
                    'type' => 'Point',
                    'coordinates' => [
                        $map->longitude,
                        $map->latitude
                    ]
                ),
                'polygon' => array(
                    'type' => 'FeatureCollection',
                    'features' => [
                        array(
                            'type' => 'Feature',
                            'id' => $map->id,
                            'properties' => array(
                                'NAMA' => $map->namacabang,
                                'ALAMAT' => $map->alamat,
                            ),
                            'geometry' => array(
                                'type' => 'Polygon',
                                'coordinates' => [
                                    $polygons
                                ]
                            ),
                        ),
                    ],
                )
            );

            array_push($mapFeatures['features'], $mapItem);
        }

        return view('map', [
            'maps' => json_encode($mapFeatures),
        ]);
    }
}