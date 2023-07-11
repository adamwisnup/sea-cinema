@extends('layouts.app')

@section('content')
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-sm">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h2 class="text-2xl font-bold mb-6">Register</h2>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <input id="name" type="text" name="name"
                            class="form-input bg-gray-200 w-full rounded-lg py-2 px-4 @error('name') border-red-500 @enderror"
                            value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                        <input id="age" type="number" name="age"
                            class="form-input w-full bg-gray-200 rounded-lg py-2 px-4 @error('age') border-red-500 @enderror"
                            value="{{ old('age') }}" required>
                        @error('age')
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
                            Register
                        </button>
                        <a href="{{ route('movies.index') }}" class="text-sm text-gray-600 hover:underline">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
