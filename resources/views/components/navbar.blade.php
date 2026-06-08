<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-xl font-bold text-slate-800 tracking-tight flex items-center gap-2">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                    Aspirasiku
                </a>
            </div>

            <!-- Right Side Navigation -->
            <div class="flex items-center gap-4">
                
                <!-- Language Switcher -->
                <div class="relative group hidden sm:block">
                    <button type="button" class="flex items-center gap-1 text-sm font-medium text-slate-600 hover:text-blue-600 focus:outline-none transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        {{ strtoupper(app()->getLocale()) }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Language Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-24 bg-white rounded-lg shadow-lg border border-slate-100 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right">
                        <a href="{{ route('language.switch', 'id') }}" class="block px-4 py-2 text-sm {{ app()->getLocale() == 'id' ? 'text-blue-600 font-bold bg-slate-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">ID</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm {{ app()->getLocale() == 'en' ? 'text-blue-600 font-bold bg-slate-50' : 'text-slate-700 hover:bg-slate-50 hover:text-blue-600' }}">EN</a>
                    </div>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="text-sm font-medium text-slate-600 hover:text-blue-600 transition-colors">{{ __('messages.login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm font-medium bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors shadow-sm">{{ __('messages.register') }}</a>
                @endguest

                @auth
                    <!-- Desktop Dropdown -->
                    <div class="relative group hidden sm:block">
                        <button type="button" class="flex items-center gap-2 text-sm font-medium text-slate-700 hover:text-blue-600 focus:outline-none transition-colors">
                            <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center font-bold">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-slate-100 py-1 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top-right">
                            <div class="px-4 py-2 border-b border-slate-100">
                                <p class="text-xs text-slate-500 font-medium uppercase tracking-wider">{{ Auth::user()->role }}</p>
                            </div>
                            
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600">{{ __('messages.dashboard_admin') }}</a>
                            @elseif(Auth::user()->isPetugas())
                                <a href="{{ route('petugas.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600">{{ __('messages.dashboard_petugas') }}</a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-blue-600">{{ __('messages.dashboard_user') }}</a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}" class="block w-full">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50 font-medium">{{ __('messages.logout') }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="sm:hidden flex items-center gap-2">
                        <a href="{{ route('language.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}" class="text-sm font-medium text-slate-600 bg-slate-100 px-2 py-1 rounded">
                            {{ app()->getLocale() == 'id' ? 'EN' : 'ID' }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm font-medium text-red-600 bg-red-50 px-3 py-1.5 rounded-md">{{ __('messages.logout') }}</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
