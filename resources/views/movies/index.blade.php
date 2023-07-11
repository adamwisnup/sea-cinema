@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-4">Movie List</h1>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($movies as $movie)
                {{-- <div class="bg-white overflow-hidden shadow-sm rounded-lg"> --}}
                <div class="bg-white overflow-hidden shadow-sm rounded-lg relative">
                    <a href="{{ route('movies.show', $movie->id) }}">
                        <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="h-full w-full object-cover">
                    </a>
                    <a href="{{ route('movies.show', $movie['id']) }}"
                        class="absolute inset-0 text-3xl flex items-center justify-center bg-black bg-opacity-90 text-white opacity-0 hover:opacity-100 transition-opacity duration-300">
                        <strong>Lihat Detail</strong>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
