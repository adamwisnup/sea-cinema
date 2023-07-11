<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    public function show()
    {
        $user_id = Auth::id();
        $balance = Balance::where('user_id', $user_id)->first();

        return view('balance.show', compact('balance'));
    }

    public function deposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $user_id = Auth::id();

        $balance = Balance::firstOrCreate(['user_id' => Auth::id()]);

        $amount = $request->input('amount');
        $balance->deposit($amount);

        return redirect()->route('balance.show', ['user_id' => Auth::id()])->with('success', 'Top-up sukses');
    }

    public function withdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ]);

        $balance = Balance::firstOrFail();

        $amount = $request->input('amount');
        $withdrawnAmount = $balance->withdraw($amount);

        return redirect()->route('balance.show', ['user_id' => Auth::id()])->with('success', 'Withdraw sukses');
    }
}
