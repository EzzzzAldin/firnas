@extends('layouts.app')

@section('title', 'Home')

@section('content')


    @include('partials.index.main')


    @include('partials.index.about')


    @include('partials.index.services')


    @include('partials.index.clients')


    @include('partials.index.reviews')


    {{-- @include('partials.index.eduction') --}}


    {{-- @include('partials.index.build') --}}


    {{-- @include('partials.index.blogs') --}}

    @include('partials.index.contact-us')
@endsection
