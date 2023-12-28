@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Add New Category</h1>
    <form action="{{ route('admins.addCategory') }}" method="post">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" required>
        <button type="submit" class="btn btn-outline-light">Add Category</button>
    </form>
</div>
