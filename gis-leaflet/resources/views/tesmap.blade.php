@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
@stop

@section('js')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.1.0/dist/esri-leaflet-vector.js"></script>
    <script>
        const map = L.map('map').setView([-6.886119421038035, 107.58153681037895], 15);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var mixueIcon = L.icon({
            iconUrl: 'assets/icons/mixue.png',

            iconSize:     [30, 34], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
        });

        const marker = L.marker([-6.886119421038035, 107.58153681037895], {icon: mixueIcon}).addTo(map).on('click', function(e) {
            alert(e.latlng)
        });

        // create a red polyline from an array of LatLng points
        var latlngs = [
            [
                -6.866683562198219,
                107.57679825680316
            ],
            [
                -6.866923165268588,
                107.57690200796026
            ],
            [
                -6.867140375425137,
                107.57693358439974
            ],
            [
                -6.867255665245111,
                107.57687495769443
            ],
            [
                -6.867356069951697,
                107.57675084330742
            ],
            [
                -6.867349224176749,
                107.576435960509
            ],
            [
                -6.867310431450676,
                107.57619692539208
            ],
            [
                -6.86737660727492,
                107.57588434100921
            ],
            [
                -6.867593390082618,
                107.57570046784298
            ],
            [
                -6.867819300481102,
                107.57576712186494
            ],
            [
                -6.867979035042254,
                107.57599466490939
            ],
            [
                -6.868049774615969,
                107.57637160490123
            ],
            [
                -6.868138886135412,
                107.576493659037
            ],
            [
                -6.868387615475257,
                107.57668442744722
            ],
            [
                -6.868526812571773,
                107.57673958939796
            ],
            [
                -6.868921584445388,
                107.57650974793927
            ],
            [
                -6.869231966230373,
                107.57618420012344
            ],
            [
                -6.869425911590383,
                107.5759599380915
            ],
            [
                -6.869426375680064,
                107.5759608053408
            ],
            [
                -6.869607004143447,
                107.57579527472495
            ],
            [
                -6.8698780727868325,
                107.57577455182576
            ],
            [
                -6.870069805275506,
                107.57571490115396
            ],
            [
                -6.8704229075279954,
                107.57560778276002
            ],
            [
                -6.871321240219288,
                107.57495400691118
            ],
            [
                -6.871520685512607,
                107.57490473243683
            ],
            [
                -6.8716969187735515,
                107.57506127284194
            ],
            [
                -6.872077934172765,
                107.5752962741862
            ],
            [
                -6.872396858432509,
                107.57513543416013
            ],
            [
                -6.873293196150172,
                107.57508156438547
            ],
            [
                -6.873783384397598,
                107.5748932845816
            ],
            [
                -6.874309802130284,
                107.57440921604206
            ]
        ];

        var polyline = L.polyline(latlngs, {color: '#00FFFF'}).addTo(map);

        // zoom the map to the polyline
        map.fitBounds(polyline.getBounds());

        polyline.on('click', (e) => {
            alert(e.latlng);
            polyline.setStyle({
                color: 'blue'
            });
        })

        // create a red polygon from an array of LatLng points
        var latlngs = [
            [
              -6.872172426703401,
              107.57721830825687
            ],
            [
              -6.872097659795948,
              107.57677848713709
            ],
            [
              -6.872110882984671,
              107.57677637505715
            ],
            [
              -6.872111276192408,
              107.57677978653086
            ],
            [
              -6.8721133337379605,
              107.57678219217874
            ],
            [
              -6.872116223451668,
              107.57678426254823
            ],
            [
              -6.872119113164012,
              107.57678432126045
            ],
            [
              -6.872205752217704,
              107.57676707057922
            ],
            [
              -6.8723029433241685,
              107.57674744687058
            ],
            [
              -6.87245137868266,
              107.57671735627227
            ],
            [
              -6.87245349778643,
              107.57671935750392
            ],
            [
              -6.872456282623851,
              107.57672135873693
            ],
            [
              -6.872461397530609,
              107.57672310851277
            ],
            [
              -6.872467178172324,
              107.5767230142714
            ],
            [
              -6.872471774436288,
              107.57672147936177
            ],
            [
              -6.872475039233233,
              107.5767192739007
            ],
            [
              -6.872477471861214,
              107.5767163978868
            ],
            [
              -6.872480070921908,
              107.57671201313141
            ],
            [
              -6.872487637800717,
              107.57671039972308
            ],
            [
              -6.872439252313452,
              107.57615113421498
            ],
            [
              -6.8725667629998455,
              107.57614556752898
            ],
            [
              -6.872508451418028,
              107.57503697923704
            ],
            [
              -6.872865981770104,
              107.57507897282005
            ],
            [
              -6.873015186640735,
              107.57506335531474
            ],
            [
              -6.873081817733183,
              107.57505640071523
            ],
            [
              -6.873123104621948,
              107.57505258175458
            ],
            [
              -6.873151719407905,
              107.57504930562891
            ],
            [
              -6.8732262966054805,
              107.57504210039707
            ],
            [
              -6.873362435311307,
              107.57498748763945
            ],
            [
              -6.873430504665869,
              107.5749600104295
            ],
            [
              -6.873496538784707,
              107.57493338737402
            ],
            [
              -6.873571914217951,
              107.57490206987671
            ],
            [
              -6.873610280346652,
              107.57488692362026
            ],
            [
              -6.873644049255158,
              107.57487337141718
            ],
            [
              -6.873650851310224,
              107.5748681899185
            ],
            [
              -6.873787251058214,
              107.57477237091533
            ],
            [
              -6.873924232574595,
              107.57467607616121
            ],
            [
              -6.873979842903732,
              107.57478603412798
            ],
            [
              -6.873979753297151,
              107.57479129229849
            ],
            [
              -6.873980414474978,
              107.57479511629612
            ],
            [
              -6.873996209479357,
              107.57482856522229
            ],
            [
              -6.874011338749474,
              107.57486000249125
            ],
            [
              -6.874029597827246,
              107.5748985731614
            ],
            [
              -6.874048241300367,
              107.57493790857711
            ],
            [
              -6.87406671834035,
              107.57497741163274
            ],
            [
              -6.8741379413103525,
              107.57512696001024
            ],
            [
              -6.874206829666914,
              107.57528011375113
            ],
            [
              -6.874275636675985,
              107.57543277838644
            ],
            [
              -6.874312370242665,
              107.57551514567422
            ],
            [
              -6.874334223447155,
              107.57556426127458
            ],
            [
              -6.874387603446834,
              107.57560072574489
            ],
            [
              -6.8744133469124,
              107.57565149241762
            ],
            [
              -6.87451978098013,
              107.57586408271888
            ],
            [
              -6.874131537603191,
              107.57605984474714
            ],
            [
              -6.874305814192766,
              107.57643017105616
            ],
            [
              -6.8735735611001445,
              107.57661921270568
            ],
            [
              -6.873573432380297,
              107.57686184246694
            ],
            [
              -6.873557147923339,
              107.57686385936789
            ],
            [
              -6.873509427903436,
              107.5768809105351
            ],
            [
              -6.8734115076040325,
              107.57691532361076
            ],
            [
              -6.873321931288785,
              107.57694699110391
            ],
            [
              -6.873277614017347,
              107.57696242620102
            ],
            [
              -6.8732172947892565,
              107.57698387173525
            ],
            [
              -6.8730497315983285,
              107.57704277862751
            ],
            [
              -6.872847343251621,
              107.57710835832768
            ],
            [
              -6.8728294109062364,
              107.57711110335829
            ],
            [
              -6.872775196068051,
              107.57711971571908
            ],
            [
              -6.872685074069061,
              107.57713492878355
            ],
            [
              -6.872509157338413,
              107.57716401380685
            ],
            [
              -6.87246371652925,
              107.57716830699735
            ],
            [
              -6.872407790406662,
              107.57717377365361
            ],
            [
              -6.872298933963052,
              107.57718437168899
            ],
            [
              -6.872249540355487,
              107.57718900015652
            ],
            [
              -6.872200646046814,
              107.57719429917563
            ],
            [
              -6.8721939979967965,
              107.57719910241919
            ],
            [
              -6.872190512187766,
              107.5772059173211
            ],
            [
              -6.872189938968378,
              107.57721105584095
            ],
            [
              -6.872190697216777,
              107.57721552380934
            ],
            [
              -6.872172426703401,
              107.57721830825687
            ]
        ];

        var polygon = L.polygon(latlngs, {color: '#FF8000'}).addTo(map);

        // zoom the map to the polygon
        map.fitBounds(polygon.getBounds());

        polygon.on('click', (e) => {
            alert(e.latlng);
            polygon.setStyle({
                color: 'red'
            });
        })

    </script>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Project GIS</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="map" style="height: 500px;"></div>
                </div>
            </div>
        </div>
    </div>
@stop