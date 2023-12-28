@extends('layouts.master')
@include('layouts.topbar')

<hr class="text-white mx-3 my-4">
<div class="container text-center text-white">
    <h1 class="text-white display-3">Edit Games</h1>
    <br><br>
    @foreach ($games as $game)
        <div class="row mt-2 mb-2">
            <h2 class="col text-white">{{ $game->name }}</h2>
            <a class="col btn btn-dark text-white border-light" href="{{ route('users.editGame', $game->id) }}">Edit</a>
        </div>
        <hr class="text-white mx-3 my-4">
    @endforeach
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
            alert("{{ session('success') }}");
            @endif
        });
    </script>
</div>