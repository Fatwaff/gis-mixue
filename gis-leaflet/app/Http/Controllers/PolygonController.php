<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Polygon;

class PolygonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'pilihMap' => 'required',
            'dataArray' => 'required'
        ]);

        $mapValue = $request->pilihMap;

        $decodeValueMap = json_decode($mapValue);

        $mixueId = $decodeValueMap->id;

        $dataArray = json_decode($request->dataArray);
        
        foreach ($dataArray as $data) {
            $polygon = new Polygon;
            $polygon->marker_id = $mixueId;
            $polygon->latitude = $data[0];
            $polygon->longitude = $data[1];
            $polygon->save();
        }

        return redirect()->route('mixues.index')->with('success', 'Data Area Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataArray = json_decode($request->dataArray);
        Polygon::where('marker_id', $id )->delete();

        foreach ($dataArray as $record) {
            // Polygon::create($record);
            if($record[0] == null || $record[1] == null){
                continue;
            }
            $polygon = new Polygon;
            $polygon->marker_id = $id;
            $polygon->latitude = $record[0];
            $polygon->longitude = $record[1];
            $polygon->save();
        }

        return redirect()->route('mixues.index')->with('success', 'Area sekolah berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
