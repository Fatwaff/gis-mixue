@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>

    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/logo-mixue.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/logo-mixue.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/logo-mixue.png">
    <link rel="icon" sizes="196x196" href="assets/img/logo-mixue.png">
    <link rel="icon" type="image/x-icon" href="assets/img/logo-mixue.png">
@stop

@section('js')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://unpkg.com/esri-leaflet@3.0.10/dist/esri-leaflet.js"></script>
    <script src="https://unpkg.com/esri-leaflet-vector@4.1.0/dist/esri-leaflet-vector.js"></script>
    <script>
        let map = L.map('map').setView([-6.873602789631105, 107.57568553959561], 18);
        L.tileLayer('https://{s}.google.com/vt?/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 19,
            subdomains:['mt0','mt1','mt2','mt3']
            // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);
        var marker;
        function onMapClick(e) {
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;

            if (marker) {
                map.removeLayer(marker);
            }

            marker = L.marker(e.latlng).addTo(map)
                .bindPopup("Koordinat " + e.latlng.toString())
                .openPopup();
        }
        map.on('click', onMapClick);

        let isiForm = document.getElementById('isiForm');
        const pilihForm = document.getElementById('pilihForm');
        pilihForm.addEventListener("change", () => {
            let formValue = pilihForm.value;
            console.log(formValue);
            switch (formValue) {
                case 'marker':
                    isiForm.innerHTML = `<form method="post" action="/mixues"  enctype="multipart/form-data">
                                @csrf
                                <div class="container col-12">
                                    <div class="row">   
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="namacabang">Nama cabang</label>
                                                <input type="text" class="form-control @error('namacabang') is-invalid @enderror" name="namacabang" id="namacabang" aria-describedby="namacabang" value="{{ old('namacabang') }}" placeholder="Enter nama cabang" autofocus>
                                                @error('namacabang')
                                                    <div class="invalid-feedback">{{ $message }}</div>                      
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" aria-describedby="alamat" value="{{ old('alamat') }}" placeholder="Enter alamat">
                                                @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="jam_operasional">Jam Operasional</label>
                                                <input type="text" class="form-control @error('jam_operasional') is-invalid @enderror" name="jam_operasional" id="jam_operasional" aria-describedby="jam_operasional" value="{{ old('jam_operasional') }}" placeholder="Enter jam operasional" autofocus>
                                                @error('jam_operasional')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">Nomor Telepon</label>
                                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" aria-describedby="no_telp" value="{{ old('no_telp') }}" placeholder="Enter nomor telepon">
                                                @error('no_telp')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="fasilitas">Fasilitas</label>
                                                <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" id="fasilitas" aria-describedby="fasilitas" value="{{ old('fasilitas') }}" placeholder="Enter fasilitas" autofocus>
                                                @error('fasilitas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" aria-describedby="foto" accept="image/*">
                                                @error('foto')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude" aria-describedby="latitude" value="{{ old('latitude') }}" placeholder="Enter latitude">
                                                @error('latitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="longitude">Longitude</label>
                                                <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" aria-describedby="longitude" value="{{ old('longitude') }}" placeholder="Enter longitude">
                                                @error('longitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map" style="height: 400px;"></div>
                                    <div class="row-lg-6 mt-3">
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                        <a href="/mixues" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </form>`;
                    map = L.map('map').setView([-6.873602789631105, 107.57568553959561], 18);
                    L.tileLayer('https://{s}.google.com/vt?/lyrs=p&x={x}&y={y}&z={z}', {
                        maxZoom: 19,
                        subdomains:['mt0','mt1','mt2','mt3']
                        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    var marker;
                    function onMapClick(e) {
                        document.getElementById('latitude').value = e.latlng.lat;
                        document.getElementById('longitude').value = e.latlng.lng;

                        if (marker) {
                            map.removeLayer(marker);
                        }

                        marker = L.marker(e.latlng).addTo(map)
                            .bindPopup("Koordinat " + e.latlng.toString())
                            .openPopup();
                    }
                    map.on('click', onMapClick);
                    break;
                case 'polygon':
                    isiForm.innerHTML = `<form method="post" action="/polygons">
                                @csrf
                                <div class="container col-12">
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <div class="row">   
                                        <div class="col-lg-12 pb-3" >
                                            <select class="custom-select" style="width: 300px" onchange="pilihPeta()" id="pilihMap" name="pilihMap" required>
                                                <option selected disabled>Pilih map</option>
                                                @foreach ($mixues as $mixue)
                                                    @if ($polygons->count() > 0)
                                                            @if (in_array($polygons, $mixue->id)
                                                                <option value='{"id":{{$mixue->id}},"lat":{{$mixue->latitude}},"lng":{{$mixue->longitude}}}'>{{$mixue->namacabang}}</option>
                                                            @endif
                                                    @else
                                                        <option value='{"id":{{$mixue->id}},"lat":{{$mixue->latitude}},"lng":{{$mixue->longitude}}}'>{{$mixue->namacabang}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" name="dataArray" id="dataArray" >                 

                                    <div id="map" style="height: 400px;"></div>
                                    <div class="row-lg-6 mt-3">
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                        <a href="/mixues" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </form>`
                    map = L.map('map').setView([-6.873602789631105, 107.57568553959561], 18);
                    L.tileLayer('https://{s}.google.com/vt?/lyrs=p&x={x}&y={y}&z={z}', {
                        maxZoom: 19,
                        subdomains:['mt0','mt1','mt2','mt3']
                        // attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                    }).addTo(map);
                    var marker;
                    var linearray = [];
                    var polygon;
                    map.on('click', function onMapClick(e) {
                        var lat = e.latlng.lat;
                        var lng = e.latlng.lng;
                        var coord = e.latlng.toString();
                        linearray.push([lat, lng]);
                        if (linearray.length > 1) {
                            if (polygon) {
                                map.removeLayer(polygon);
                            }
                            polygon = L.polygon(linearray, {
                                color: 'red'
                            }).addTo(map);
                        }
                        var jsonData = JSON.stringify(linearray);

                        document.getElementById('dataArray').value = jsonData;
                        console.log(document.getElementById('dataArray').value);
                    });
                    break;
            }
        });
        function pilihPeta() {
            const mapValue = document.getElementById("pilihMap").value;
            const mapValueJson = JSON.parse(mapValue);
            console.log(mapValueJson);
            map.flyTo([mapValueJson.lat, mapValueJson.lng], 18);
        }
    </script>
@stop

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Cabang Mixue</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="">
                        <div class="col-lg-12 pb-3" >
                            <p class="pr-2 d-inline">Tambah :</p>
                            <select class="custom-select" style="width: 150px" id="pilihForm">
                                <option selected value="marker">Titik</option>
                                <option value="polygon">Area</option>
                            </select>
                        </div>
                        <div id="isiForm">
                            <form method="post" action="/mixues" enctype="multipart/form-data">
                                @csrf
                                <div class="container col-12">
                                    {{-- @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif --}}
                                    <div class="row">   
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="namacabang">Nama cabang</label>
                                                <input type="text" class="form-control @error('namacabang') is-invalid @enderror" name="namacabang" id="namacabang" aria-describedby="namacabang" value="{{ old('namacabang') }}" placeholder="Enter nama cabang" autofocus>
                                                @error('namacabang')
                                                    <div class="invalid-feedback">{{ $message }}</div>                      
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" aria-describedby="alamat" value="{{ old('alamat') }}" placeholder="Enter alamat">
                                                @error('alamat')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="jam_operasional">Jam Operasional</label>
                                                <input type="text" class="form-control @error('jam_operasional') is-invalid @enderror" name="jam_operasional" id="jam_operasional" aria-describedby="jam_operasional" value="{{ old('jam_operasional') }}" placeholder="Enter jam operasional" autofocus>
                                                @error('jam_operasional')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="no_telp">Nomor Telepon</label>
                                                <input type="text" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" id="no_telp" aria-describedby="no_telp" value="{{ old('no_telp') }}" placeholder="Enter nomor telepon">
                                                @error('no_telp')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="fasilitas">Fasilitas</label>
                                                <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" name="fasilitas" id="fasilitas" aria-describedby="fasilitas" value="{{ old('fasilitas') }}" placeholder="Enter fasilitas" autofocus>
                                                @error('fasilitas')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="foto">Foto</label>
                                                <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto" id="foto" aria-describedby="foto" accept="image/*">
                                                @error('foto')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="latitude">Latitude</label>
                                                <input type="text" class="form-control @error('latitude') is-invalid @enderror" name="latitude" id="latitude" aria-describedby="latitude" value="{{ old('latitude') }}" placeholder="Enter latitude">
                                                @error('latitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="longitude">Longitude</label>
                                                <input type="text" class="form-control @error('longitude') is-invalid @enderror" name="longitude" id="longitude" aria-describedby="longitude" value="{{ old('longitude') }}" placeholder="Enter longitude">
                                                @error('longitude')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div id="map" style="height: 400px;"></div>
                                    <div class="row-lg-6 mt-3">
                                        <button type="submit" class="btn btn-danger">Simpan</button>
                                        <a href="/mixues" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop