@extends('layouts.master')

@section('title', 'GAMEX/index')

@section('content')
    @include('layouts.topbar')
    <hr class="text-white mx-3 my-4">
    @include('layouts.carousel')
    @include('games.index')
@endsection
