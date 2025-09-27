<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-quaternary text-secondary antialiased font-poppins justify-between flex flex-col min-h-screen">
    <nav
        class="flex justify-between items-center p-5 px-10 border-b border-white/40 bg-secondary text-gray-200 shadow-2xl w-full">
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="">
            </a>
        </div>
        <div class="space-x-8 font-bold">
            <a href="/">Jobs</a>
            <a href="/">Careers</a>
            <a href="/">Employers</a>
            <a href="/">Profile</a>
        </div>

        {{-- <div>
                <a href="/jobs/create">Post a Job</a>
            </div> --}}

        @auth
            <div class="space-x-4">
                <a href="/jobs/create">Post a Job</a>
                <a href="/logout"
                    class="bg-tertiary/75 hover:bg-tertiary/100 py-2 px-4 rounded-full transition ease-in-out delay-150 duration-300">Logout</a>
            </div>
        @endauth

        @guest
            <div class="space-x-4 font-bold">
                <a href="/login">Log in</a>
                <a href="/register">Register</a>
            </div>
        @endguest

    </nav>

    <div>
        <main class="max-w-[980px] mx-auto">
            {{ $slot }}
        </main>
    </div>


    <footer>
        <div class="footer mt-12 w-full">
            <div class="border-t border-secondary"></div>
            <div class="py-6 flex justify-center items-center text-secondary">
                &copy; 2024 Pixel Positions. All rights reserved.
            </div>
        </div>
    </footer>
</body>

</html>
