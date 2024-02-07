@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Sekolah</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('sekolahs.create')}}" class="btn btn-primary mb-2">Tambah</a>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                    <table class="table table-hover table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>Nama Sekolah</th>
                                <th>Alamat Sekolah</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sekolahs as $key => $sekolah)
                                <tr>
                                    <td>{{$sekolah->namasekolah}}</td>
                                    <td>{{$sekolah->alamat}}</td>
                                    <td>{{$sekolah->latitude}}</td>
                                    <td>{{$sekolah->longitude}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
