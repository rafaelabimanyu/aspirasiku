<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Aspirasiku - Layanan Pengaduan Masyarakat')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts and Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Custom scrollbar for webkit */
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>
</head>
<body class="antialiased bg-[#f8fafc] text-slate-800 min-h-screen flex flex-col selection:bg-blue-200 selection:text-blue-900">

    <!-- Navbar Component -->
    @include('components.navbar')

    <!-- Flash Messages (Toast Notifications) -->
    @if(session('success') || session('error') || session('info'))
        <div class="fixed top-24 left-1/2 transform -translate-x-1/2 z-50 w-full max-w-md px-4 pointer-events-none">
            @if(session('success'))
                <div class="bg-white/80 backdrop-blur-md border border-emerald-200 shadow-[0_8px_30px_rgb(0,0,0,0.08)] rounded-2xl p-4 flex items-center gap-3 animate-[slideDown_0.5s_ease-out_forwards]">
                    <div class="w-8 h-8 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                    <p class="font-medium text-slate-800 text-sm">{{ session('success') }}</p>
                </div>
            @endif
            @if(session('error'))
                <div class="bg-white/80 backdrop-blur-md border border-red-200 shadow-[0_8px_30px_rgb(0,0,0,0.08)] rounded-2xl p-4 flex items-center gap-3 animate-[slideDown_0.5s_ease-out_forwards]">
                    <div class="w-8 h-8 rounded-full bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </div>
                    <p class="font-medium text-slate-800 text-sm">{{ session('error') }}</p>
                </div>
            @endif
        </div>
        <style>
            @keyframes slideDown {
                from { opacity: 0; transform: translate(-50%, -100%); }
                to { opacity: 1; transform: translate(-50%, 0); }
            }
        </style>
    @endif

    <!-- Main Content -->
    <main class="flex-grow w-full relative z-0">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white/60 backdrop-blur-md border-t border-slate-200/60 mt-auto relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <p class="text-center text-sm font-medium text-slate-400">
                &copy; {{ date('Y') }} Aspirasiku. Hak Cipta Dilindungi.
            </p>
        </div>
    </footer>
</body>
</html>
