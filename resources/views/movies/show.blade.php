@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <div class="">
            <div class="max-w-md mx-auto overflow-hidden shadow-md bg-gray-200 rounded-lg">
                <div class="p-6">
                    <a href="{{ route('movies.index') }}"
                        class="flex items-center justify-center text-sm text-gray-500 hover:text-gray-700 mb-4">
                        <svg class="h-6 w-6 fill-current mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24">
                            <path d="M15.41,16.58L10.83,12L15.41,7.41L14,6L8,12L14,18L15.41,16.58Z"></path>
                        </svg>
                        Previous
                    </a>
                    <img src="{{ $movie->poster }}" alt="{{ $movie->title }}" class="h-full w-96 mx-auto object-cover">
                    <div class="text-center">
                        <div class="font-bold text-xl mt-4">{{ $movie->title }}</div>
                        <p class="text-gray-600 text-sm">{{ $movie->description }}</p>
                        <button>
                            <a href="{{ route('ticket.showBookingForm', ['movieId' => $movie->id]) }}"
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mt-4">
                                Ticket Price: Rp{{ number_format($movie->ticket_price, 0, ',', '.') }}
                            </a>


                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
