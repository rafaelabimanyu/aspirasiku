<header class="bg-white/70 backdrop-blur-xl border-b border-slate-200/50 sticky top-0 z-40 transition-all duration-500">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 or 20 items-center py-4">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-black tracking-tight text-slate-800 flex items-center gap-2 group transition-all duration-500">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white shadow-lg shadow-blue-500/30 group-hover:shadow-blue-500/50 group-hover:-translate-y-0.5 transition-all duration-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                        </svg>
                    </div>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-slate-900 to-slate-700">Aspirasiku</span>
                </a>
            </div>

            <!-- Right Side Navigation -->
            <div class="flex items-center gap-6">
                
                <!-- Language Switcher -->
                <div class="relative group hidden sm:block">
                    <button type="button" class="flex items-center gap-1 text-sm font-semibold text-slate-500 hover:text-blue-600 focus:outline-none transition-colors duration-300">
                        <svg class="w-5 h-5 opacity-70" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                        </svg>
                        {{ strtoupper(app()->getLocale()) }}
                        <svg class="w-4 h-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <!-- Language Dropdown Menu -->
                    <div class="absolute right-0 mt-3 w-28 bg-white/90 backdrop-blur-lg rounded-2xl shadow-[0_10px_40px_rgb(0,0,0,0.08)] border border-white p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right translate-y-2 group-hover:translate-y-0">
                        <a href="{{ route('language.switch', 'id') }}" class="block px-4 py-2 text-sm rounded-xl transition-colors {{ app()->getLocale() == 'id' ? 'text-blue-700 font-bold bg-blue-50' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">ID - Bahasa</a>
                        <a href="{{ route('language.switch', 'en') }}" class="block px-4 py-2 text-sm rounded-xl transition-colors mt-1 {{ app()->getLocale() == 'en' ? 'text-blue-700 font-bold bg-blue-50' : 'text-slate-600 hover:bg-slate-50 hover:text-blue-600' }}">EN - English</a>
                    </div>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-900 transition-colors duration-300">{{ __('messages.login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 hover:shadow-lg hover:shadow-slate-900/20 hover:-translate-y-0.5 transition-all duration-500">{{ __('messages.register') }}</a>
                @endguest

                @auth
                    <!-- Desktop Dropdown -->
                    <div class="relative group hidden sm:block">
                        <button type="button" class="flex items-center gap-3 pl-3 pr-2 py-1.5 rounded-full bg-slate-50 hover:bg-slate-100 border border-slate-200/60 focus:outline-none transition-all duration-300 group-hover:shadow-sm">
                            <span class="text-sm font-semibold text-slate-700">{{ Auth::user()->name }}</span>
                            <span class="w-8 h-8 rounded-full bg-gradient-to-tr from-blue-500 to-indigo-500 text-white flex items-center justify-center font-bold shadow-inner">
                                {{ substr(Auth::user()->name, 0, 1) }}
                            </span>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 mt-3 w-56 bg-white/90 backdrop-blur-xl rounded-2xl shadow-[0_20px_50px_rgb(0,0,0,0.1)] border border-white p-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right translate-y-2 group-hover:translate-y-0">
                            <div class="px-4 py-3 border-b border-slate-100/60 mb-2">
                                <p class="text-xs text-blue-600 font-bold uppercase tracking-wider">{{ Auth::user()->role }}</p>
                                <p class="text-sm text-slate-500 truncate mt-0.5">{{ Auth::user()->username }}</p>
                            </div>
                            
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-colors">{{ __('messages.dashboard_admin') }}</a>
                            @elseif(Auth::user()->isPetugas())
                                <a href="{{ route('petugas.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-colors">{{ __('messages.dashboard_petugas') }}</a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="block px-4 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 rounded-xl transition-colors">{{ __('messages.dashboard_user') }}</a>
                            @endif
                            
                            <form method="POST" action="{{ route('logout') }}" class="block w-full mt-1">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2.5 text-sm text-red-600 hover:bg-red-50 font-semibold rounded-xl transition-colors">{{ __('messages.logout') }}</button>
                            </form>
                        </div>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="sm:hidden flex items-center gap-2">
                        <a href="{{ route('language.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}" class="text-xs font-bold text-slate-600 bg-white shadow-sm border border-slate-200 px-3 py-2 rounded-lg">
                            {{ app()->getLocale() == 'id' ? 'EN' : 'ID' }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-xs font-bold text-red-600 bg-red-50 px-4 py-2 rounded-lg">{{ __('messages.logout') }}</button>
                        </form>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>
