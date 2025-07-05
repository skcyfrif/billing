<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/css/app.css', 'resources/css/welcome.css', 'resources/js/app.js'])
    @else
    @endif
</head>
{{-- <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>


        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body> --}}
<section class="hero">
    <div class="hero-image">
        <img src="https://cdn.dribbble.com/userupload/21234944/file/original-53c91b6d469bc15496fe84f6944e8ec3.png?resize=752x&vertical=center" alt="Hero Image">
        <h1>Welcome to Billing Software</h1>

    <div class="hero-content">

        <div class="button-group">

            @if (Route::has('login'))

                @auth
                    <a href="{{ url('/dashboard') }}">
                        Go to Dashboard
                    </a>
                @else

                    <a href="{{ route('login') }}">
                        Log in
                    </a>


                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}">
                            Register
                        </a>
                    @endif --}}

                @endauth
            @endif
        </div>
    </div>
    </div>
</section>
</body>

</html>
