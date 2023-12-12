@extends('layouts.master')

@section('title', 'GAMEX/racing')

@php
$selectedCategory = 'racing';
@endphp

@section('content')
    @include('layouts.dbselectedgames')
@endsection
