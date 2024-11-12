<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ELITES ACADEMY - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-blue-600 text-center" id="system-name">ELITES ACADEMY STUDENT MANAGEMENT SYSTEM</h1>
            {{-- <div class="flex space-x-4">
                <!-- Show only to guests (not logged-in users) -->
                @guest
                    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded">Login</a>
                   
                @endguest

                <!-- Show only to authenticated (logged-in) users -->
                @auth
                    <a href="{{ route('logout') }}" 
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                       class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded">
                       Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </div> --}}
        </div>
    </header>

    <main class="flex-grow flex flex-col justify-center items-center text-center px-6">
        <!-- Logo Section -->
        <div class="mb-6">
            <img src="{{ asset('images/elite/logo2.png') }}" alt="ELITES ACADEMY Logo" class="h-32 w-auto mx-auto">
        </div>

       
        <p class="text-gray-600 text-lg mb-8">Empowering students with quality education and modern learning facilities.</p>
        <h2 class="text-gray-600 text-lg mb-8">
            <div id="currentTime">
            {{ \Carbon\Carbon::now()->format('l, F j, Y - h:i:s A') }}
        </div></h2>
        <div class="flex space-x-4">
            <!-- Show only to guests (not logged-in users) -->
            @guest
                <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded">Login</a>
               
            @endguest

            <!-- Show only to authenticated (logged-in) users -->
            @auth
                <a href="{{ route('dashboard') }}" 
                   
                   class="bg-blue-600 hover:bg-green-700 text-white font-medium px-4 py-2 rounded">
                   Dashboard
                </a>
                
            @endauth
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} ELITES ACADEMY. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // JavaScript to update the time every second
        function updateTime() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const now = new Date().toLocaleString('en-US', options);
            document.getElementById('currentTime').innerText = now;
        }

        // Update time every second
        setInterval(updateTime, 1000);

        // Call once to avoid delay
        updateTime();
    </script>
</body>
</html>
