@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Categories</h1>
    <a class="btn btn-outline-light mt-3 mb-3" href="{{ route('admins.addCategory') }}">Add New Category</a>
    @foreach ($categories as $category)
        <h3>{{ $category->name }}</h3>
    @endforeach
</div>
