<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEA CINEMA</title>
    @vite('resources/css/app.css')
</head>

<body>
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="/" class="text-white font-bold text-3xl">SEA CINEMA</a>

            <div class="relative">
                @auth
                    <button
                        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        aria-haspopup="true" x-data="{ isOpen: false }" @click="isOpen = !isOpen">
                        {{ Auth::user()->name }}
                        <svg class="h-4 w-4 ml-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M7.44 6.21a2 2 0 112.86 2.83l-2.86 2.88a2 2 0 01-2.83-2.83L7.44 6.2zM10 18a8 8 0 100-16 8 8 0 000 16zm0-2a6 6 0 110-12 6 6 0 010 12z" />
                        </svg>
                    </button>

                    <div class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg overflow-hidden z-10"
                        x-show="isOpen" @click.away="isOpen = false">
                        <a href="{{ route('balance.show', ['user_id' => Auth::id()]) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Balance</a>
                        <a href="{{ route('ticket.history', ['user_id' => Auth::id()]) }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">History</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                @else
                    <div>
                        <a href="{{ route('login') }}"
                            class="text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Login</a>
                    </div>
                @endauth
            </div>
        </div>
    </nav>





    @yield('content')
</body>

</html>
