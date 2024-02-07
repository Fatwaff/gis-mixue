@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Project GIS</h1>
@stop

@section('content')
    <form action="{{route('sekolahs.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow: auto">
                        <table style="width: 100%">
                            <tr>
                                <td><label for="LabelNama">Nama Sekolah</label></td>
                                <td><input type="text" size="70" id="inputnama" placeholder="Nama Sekolah" name="namasekolah"></td>
                            </tr>
                            <tr>
                                <td><label for="LabelAlamat">Alamat Sekolah</label></td>
                                <td><input type="text" size="70" id="inputalamat" placeholder="Alamat Sekolah" name="alamat"></td>
                            </tr>
                            <tr>
                                <td><label for="LabelLatitude">Latitude</label></td>
                                <td><input type="text" size="70" id="inputlatitude" placeholder="Latitude" name="latitude"></td>
                            </tr>
                            <tr>
                                <td><label for="Labellongitude">Longitude</label></td>
                                <td><input type="text" size="70" id="inputlongitude" placeholder="Longitude" name="longitude"></td>
                            </tr>
                        </table>
                        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
                        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
                        crossorigin=""/>
                        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
                        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
                        crossorigin=""></script>
                        <style>
                            #map { height: 400px; }
                        </style>
                        <div id="map" class="mt-3"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{route('sekolahs.index')}}" class="btn btn-default">Batal</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@stop

@push('js')
    <script>
        var map = L.map('map').setView([-6.8931149, 107.6090784], 18);
        L.tileLayer('https://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains:['mt0','mt1','mt2','mt3']
            // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        // var marker;
        // function onMapClick(e) {
        //     document.getElementById('inputlatitude').value = e.latlng.lat;
        //     document.getElementById('inputlongitude').value = e.latlng.lng;

        //     if (marker) {
        //         map.removeLayer(marker);
        //     }

        //     marker = L.marker(e.latlng).addTo(map)
        //         .bindPopup("Koordinat " + e.latlng.toString())
        //         .openPopup();
        // }
        // map.on('click', onMapClick);

        // var latlngs = [
        //     [45.51, -122.68],
        //     [37.77, -122.43],
        //     [34.04, -118.2],
        // ];

        // var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

        var marker;
        var linearray = [];
        var polyline;

        map.on('click', function onMapClick(e) {
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            document.getElementById('inputlatitude').value = lat;
            document.getElementById('inputlongitude').value = lng;

            if (polyline) {
                map.removeLayer(polyline);
            }

            linearray.push(e.latlng);

            // marker = L.marker(e.latlng).addTo(map)
            //     .bindPopup("Koordinat " + e.latlng.toString())
            //     .openPopup();
            polyline = L.polyline(linearray, {color: 'red'}).addTo(map);
        });

        // var marker;
        // var circle;

        // map.on('click', function onMapClick(e) {
        //     lat = e.latlng.lat;
        //     lng = e.latlng.lng;
        //     document.getElementById('inputlatitude').value = lat;
        //     document.getElementById('inputlongitude').value = lng;

        //     if (marker) {
        //         map.removeLayer(marker);
        //     }

        //     if (circle) {
        //         map.removeLayer(circle);
        //     }

        //     marker = L.marker(e.latlng).addTo(map)
        //         .bindPopup("Koordinat " + e.latlng.toString())
        //         .openPopup();

        //     circle = L.circle(e.latlng, {
        //         color: 'red',
        //         fillColor: '#f03',
        //         fillOpacity: 0.5,
        //         radius: 100
        //     }).addTo(map);
        // });


    </script>
@endpush