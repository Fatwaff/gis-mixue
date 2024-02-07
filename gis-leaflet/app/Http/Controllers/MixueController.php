<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mixue;
use App\Models\Polygon;
use Illuminate\Support\Facades\Storage;

class MixueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('mixues.index', [
            'semuamixue' => \App\Models\Mixue::all()->sortBy('namacabang'),
            'mixues' => \App\Models\Mixue::all()->sortBy('namacabang')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mixues.create', [
            'mixues' => \App\Models\Mixue::all(),
            'polygons' => \App\Models\Polygon::select('marker_id')->distinct()->get()
        ]);
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
        $validatedData = $request->validate([
            'namacabang' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jam_operasional' => 'required|max:255',
            'no_telp' => 'required|max:255',
            'fasilitas' => 'required|max:255',
            'foto' => 'image|file|required|max:1024',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ]);

        $validatedData['foto'] = $request->file('foto')->store('foto-mixue');

        Mixue::create($validatedData);

        return redirect('/mixues')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Mixue $mixue)
    {
        //
        $polygons = Polygon::where('marker_id', $mixue->id)->get();

        return response()->json([
            'mixue' => $mixue,
            'polygons' => $polygons
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mixue $mixue)
    {
        //
        $polygon = Polygon::where('marker_id', $mixue->id)->distinct()->get();
        // dd($polygon);

        return view('mixues.edit', [
            'mixue' => $mixue,
            'polygon' => $polygon
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mixue $mixue)
    {
        //
        $validatedData = $request->validate([
            'namacabang' => 'required|max:255',
            'alamat' => 'required|max:255',
            'jam_operasional' => 'required|max:255',
            'no_telp' => 'required|max:255',
            'fasilitas' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ]);

        if($request->file('foto')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto-mixue');
        }

        Mixue::where('id', $mixue->id)->update($validatedData);

        return redirect('/mixues')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mixue $mixue)
    {
        //
        if($mixue->foto) {
            Storage::delete($mixue->foto);
        }

        Polygon::where('marker_id', $mixue->id)->delete();
        Mixue::destroy($mixue->id);

        return redirect('/mixues')->with('success', 'Data berhasil dihapus');
    }
}
