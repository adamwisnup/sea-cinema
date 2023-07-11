@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-6">Login</h2>
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input id="name" type="text" name="name"
                            class="form-input w-full bg-gray-200 rounded-lg py-2 px-4 @error('email') border-red-500 @enderror"
                            required autofocus>
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input id="password" type="password" name="password"
                            class="form-input w-full bg-gray-200 rounded-lg py-2 px-4 @error('password') border-red-500 @enderror"
                            required>
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Login
                        </button>
                        <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:underline">Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
