@extends('main.layout.master')

@section('styles')
    @include('main.assets.bootstrapcss')
    @include('main.assets.style')
 @endsection

@section('content') 
    @include('main.layout.header-main')
    @include('main.layout.header2-main')
    
    <main class="success_page">
        <div class="content">
            <i class="fas fa-check-circle"></i>
            <span>You've Successfully Book your Car</span>
        </div>

        <div class="links">
            <a href="/home">Check you email for the Booking Details</a>
        </div>
    </main>

    @include('main.layout.footer')
@endsection

@section('script')
    @include('main.assets.script')
    @include('main.assets.bootstrapjs')
@endsection

