@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Project GIS</h1>
@stop

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
@stop

@section('content')
    
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body" style="overflow: auto">
                        <div class="row">
                            <div class="pr-3" style="width: 150px">
                                <select class="custom-select" id="pilihmap">
                                    <option selected value="street">Street</option>
                                    <option value="hybrid">Hybrid</option>
                                    <option value="satellite">Satellite</option>
                                    <option value="terrain">Terrain</option>
                                </select>
                            </div>
                            <div style="width: 150px;">
                                <select class="custom-select" id="pilihshape">
                                    <option selected disabled>Pilih shape</option>
                                    <option value="marker">Marker</option>
                                    <option value="polyline">Polyline</option>
                                    <option value="polygon">Polygon</option>
                                    <option value="circle">Circle</option>
                                </select>
                            </div>
                        </div>
                        
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
                </div>
            </div>
        </div>
@stop

@push('js')
    <script>
        var map = L.map('map').setView([-6.8931149, 107.6090784], 18);

        const pilihmap = document.getElementById('pilihmap');

        L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        pilihmap.addEventListener("change", () => {
            let mapvalue = pilihmap.value;
            var lyrs = '';
            if (mapvalue == 'street') {
                lyrs = 'm';
            } 
            if (mapvalue == 'hybrid') {
                lyrs = 's,h';
            }
            if (mapvalue == 'satellite') {
                lyrs = 's';
            } 
            if (mapvalue == 'terrain') {
                lyrs = 'p';
            }
            L.tileLayer('http://{s}.google.com/vt?lyrs=' + lyrs + '&x={x}&y={y}&z={z}', {
                maxZoom: 19,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);
        });

        const hideStyle = {
            opacity: 0,
            fillOpacity: 0  
        };

        const pilihshape = document.getElementById('pilihshape');
        var marker;
        var linearray = [];
        var polyline;
        var polygon;
        var circle;

        pilihshape.addEventListener("change", () => {
            let shapevalue = pilihshape.value;
            if (marker) {
                map.removeLayer(marker);
            }
            if (polyline) {
                map.removeLayer(polyline);
                linearray = []; 
            }
            if (polygon) {
                map.removeLayer(polygon);
                linearray = [];
            }
            if (circle) {
                map.removeLayer(circle);
            }
            if (shapevalue == 'marker') {
                map.on('click', function onMapClick(e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    if (polyline) {
                        polyline.setStyle(hideStyle);
                    }
                    if (polygon) {
                        polygon.setStyle(hideStyle);
                    }
                    if (circle) {
                        circle.setStyle(hideStyle);
                    }
                    marker = L.marker(e.latlng).addTo(map)
                        .bindPopup("Koordinat " + e.latlng.toString())
                        .openPopup();
                });
                return;
            } 
            if (shapevalue == 'polyline') {
                map.on('click', function onMapClick(e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    if (polyline) {
                        map.removeLayer(polyline);
                    }
                    if (polygon) {
                        polygon.setStyle(hideStyle);
                    }
                    if (circle) {
                        circle.setStyle(hideStyle);
                    }
                    linearray.push(e.latlng);
                    marker = L.marker(e.latlng).addTo(map)
                        .bindPopup("Koordinat " + e.latlng.toString())
                        .openPopup();
                    polyline = L.polyline(linearray, {color: 'red'}).addTo(map);
                });
                return;
            }
            if (shapevalue == 'polygon') {
                map.on('click', function onMapClick(e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    if (polygon) {
                        map.removeLayer(polygon);
                    }
                    if (polyline) {
                        polyline.setStyle(hideStyle);
                    }
                    if (circle) {
                        circle.setStyle(hideStyle);
                    }
                    linearray.push(e.latlng);
                    marker = L.marker(e.latlng).addTo(map)
                        .bindPopup("Koordinat " + e.latlng.toString())
                        .openPopup();
                    polygon = L.polygon(linearray, {color: 'red'}).addTo(map);
                });
                return;
            } 
            if (shapevalue == 'circle') {
                map.on('click', function onMapClick(e) {
                    if (marker) {
                        map.removeLayer(marker);
                    }
                    if (circle) {
                        map.removeLayer(circle);
                    }
                    if (polygon) {
                        map.removeLayer(polygon);
                    }
                    if (polyline) {
                        polyline.setStyle(hideStyle);
                    }
                    marker = L.marker(e.latlng).addTo(map)
                        .bindPopup("Koordinat " + e.latlng.toString())
                        .openPopup();
                    circle = L.circle(e.latlng, {
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5,
                        radius: 100
                    }).addTo(map);
                });
            }
        });

    </script>
@endpush