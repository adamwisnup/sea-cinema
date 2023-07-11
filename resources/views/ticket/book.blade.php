@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-4">Book Movie Tickets</h1>

        @if (session('success'))
            <div class="bg-green-200 text-green-800 px-4 py-3 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-200 text-red-800 px-4 py-3 rounded mb-4" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('ticket.book', ['movieId' => $movieId]) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="seat_numbers" class="block font-medium text-gray-700">Seat Numbers:</label>
                <select name="seat_numbers[]" id="seat_numbers" multiple
                    class="form-multiselect mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    @for ($i = 1; $i <= 64; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
                @error('seat_numbers')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="age" class="block font-medium text-gray-700">Age:</label>
                <input type="number" name="age" id="age"
                    class="form-input mt-1 block w-full rounded-md shadow-sm" required>
                @error('age')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Book
                Tickets</button>
        </form>

    </div>
@endsection
