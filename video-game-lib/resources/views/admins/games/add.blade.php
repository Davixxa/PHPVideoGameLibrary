@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Add New Game</h1>
    <form action="{{ route('admins.addGame') }}" method="post">
        @csrf
        <div class="mt-2 mb-2">
            <label for="name">Name:</label>
            <input type="text" name="name" required>
        </div>

        <div class="mt-2 mb-2">
            <label for="description">Description:</label>
            <textarea name="description" required></textarea>
        </div>

        <div class="mt-2 mb-2">
            <label for="publishing_date">Publishing Date:</label>
            <input type="date" name="publishing_date" required>
        </div>

        <div class="mt-2 mb-2">
            <label for="category">Category:</label>
            <select name="category">
                @foreach ($categories as $categoryId => $categoryName)
                    <option value="{{ $categoryName }}">{{ $categoryName }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-outline-light">Add Game</button>
    </form>
</div>


