@extends('layout.main')
@section('title','Administrator - Data Program Studi')
@section('content')
    <div>
        Halo Program Studi {{auth()->user()->name}}
    </div>
@endsection