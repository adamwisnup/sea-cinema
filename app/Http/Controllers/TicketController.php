<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function showBookingForm($movieId)
    {
        $movie = Movie::findOrFail($movieId);

        return view('ticket.book', compact('movie', 'movieId'));
    }


    public function book(Request $request, $movieId)
    {
        $movie = Movie::findOrFail($movieId);

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan login untuk booking ticket!');
        }

        $userAge = Auth::user()->age;
        if ($userAge < $movie->age_rating) {
            return redirect()->route('movies.show', $movieId)->with('error', 'Usia anda tidak sesuai dengan batas minimal menonton film.');
        }

        $request->validate([
            'seat_numbers' => 'required|array|max:6',
            'seat_numbers.*' => 'required|integer|min:1|max:64|unique:tickets,seat_numbers,NULL,id,movie_id,' . $movieId,
        ]);

        $ticketPrice = $movie->ticket_price;
        $totalCost = count($request->seat_numbers) * $ticketPrice;

        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->movie_id = $movieId;
        $ticket->seat_numbers = implode(',', $request->seat_numbers);
        $ticket->total_cost = $totalCost;
        $ticket->save();

        return redirect()->route('movies.show', ['id' => $movieId])->with('success', 'Sukses booking ticket.');
    }


    public function cancel($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        if (!Auth::check() || $ticket->user_id !== Auth::user()->id) {
            return redirect()->route('movies.show', $ticket->movie_id)->with('error', 'Tidak bisa cancel ticket.');
        }

        $ticket->delete();

        return redirect()->route('movies.show', $ticket->movie_id)->with('success', 'Sukses cancel booking ticket.');
    }

    public function history()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silahkan melihat riwayat pembelian di history.');
        }

        $userTickets = Ticket::where('user_id', Auth::user()->id)->get();

        return view('ticket.history', compact('userTickets'));
    }
}
