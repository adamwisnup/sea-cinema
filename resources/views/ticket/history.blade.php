@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-4">Ticket History</h1>

        @if (count($userTickets) > 0)
            <ul class="divide-y divide-gray-300">
                @foreach ($userTickets as $ticket)
                    <li class="py-4">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="font-semibold">{{ $ticket->movie->title }}</p>
                                <p>Ticket ID: {{ $ticket->id }}</p>
                                <p>Seat Numbers: {{ $ticket->seat_numbers }}</p>
                            </div>
                            <div>
                                <form action="{{ route('ticket.cancel', $ticket->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:text-red-700">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No ticket history available.</p>
        @endif
    </div>
@endsection
