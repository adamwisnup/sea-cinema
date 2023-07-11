<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();

        return view('movies.index', compact('movies'));
    }

    public function show($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return redirect()->route('movies.index')->with('error', 'Film tidak tersedia.');
        }

        return view('movies.show', compact('movie'));
    }
}
