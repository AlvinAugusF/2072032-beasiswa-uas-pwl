@extends('layout.main')
@section('title','Dekan - Main Page')
@section('content')
    <div>
        Halo Dekan {{auth()->user()->name}}
    </div>
@endsection