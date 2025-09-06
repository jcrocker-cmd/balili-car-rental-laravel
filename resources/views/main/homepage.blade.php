@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
 @endsection

@section('content') 
    @include('main.layout.topheader')
    @include('main.layout.header')
    @include('main.components.allcars-content')
    @include('main.layout.footer')
@endsection

@section('script')
    @include('main.assets.script')
    @include('main.assets.bootstrapjs')
@endsection

