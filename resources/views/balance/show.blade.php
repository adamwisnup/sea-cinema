@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-10 px-4">
        <div class="bg-white p-4 rounded">
            <h2 class="text-lg font-bold mb-2">Saldo saat ini:</h2>
            @if ($balance)
                <p class="text-xl">Rp.{{ number_format($balance->amount, 0, ',', '.') }}</p>
            @else
                <p class="text-xl">Rp. 0</p>
            @endif
        </div>

        <div class="mt-6">
            <form action="{{ route('balance.deposit') }}" method="POST">
                @csrf
                <div class="flex items-center">
                    <label for="deposit_amount" class="mr-2">Tambah Saldo:</label>
                    <input type="number" name="amount" id="deposit_amount" min="0" step="1000" required
                        class="w-40 px-2 py-1 border border-gray-500 bg-gray-200 rounded-lg">
                    <button type="submit"
                        class="ml-4 bg-black hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Deposit</button>
                </div>
            </form>
        </div>

        <div class="mt-4">
            <form action="{{ route('balance.withdraw') }}" method="POST">
                @csrf
                <div class="flex items-center">
                    <label for="withdraw_amount" class="mr-2">Tarik Saldo:</label>
                    <input type="number" name="amount" id="withdraw_amount" min="0" step="1000" required
                        class="w-40 px-2 py-1 border border-gray-300 bg-gray-200 rounded-lg">
                    <button type="submit"
                        class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Withdraw</button>
                </div>
            </form>
        </div>
    </div>
@endsection
