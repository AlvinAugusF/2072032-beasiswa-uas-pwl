@extends('layout.main')
@section('title','Mahasiswa - Mahasiswa')
@section('content')
    <div>
        Halo Mahasiswa {{auth()->user()->name}}
    </div>
@endsection