@extends('layouts.master')

@section('title', 'GAMEX/index')

@php
$selectedCategory = '';
@endphp

@section('content')
    @include('layouts.dbgames')
@endsection
