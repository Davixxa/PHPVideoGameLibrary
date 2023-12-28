@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Edit Game</h1>
    <h2 class="text-white">{{ $game->name }}</h2>

    <form action="{{ route('admins.updateGame', $game->id) }}" method="post">
        @csrf
        <div class="mt-2 mb-2">
            <label for="name" class="text-white">Name:</label>
            <input type="text" name="name" value="{{ $game->name }}" class="form-control" required>
        </div>

        <div class="mt-2 mb-2">
            <label for="description" class="text-white">Description:</label>
            <textarea name="description" class="form-control" required>{{ $game->description }}</textarea>
        </div>

        <div class="mt-2 mb-2">
            <label for="publishing_date" class="text-white">Publishing Date:</label>
            <input type="date" name="publishing_date" value="{{ $game->publishing_date }}" class="form-control" required>
        </div>

        <div class="mt-2 mb-2">
            <label for="category" class="text-white">Category:</label>
            <select name="category" class="form-control">
                @foreach ($categories as $categoryId => $categoryName)
                    <option value="{{ $categoryName }}">{{ $categoryName }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-outline-light">Update Game</button>
    </form>
</div>
