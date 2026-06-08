<div class="h-full flex flex-col py-6 px-4 bg-white/40 backdrop-blur-3xl border-r border-slate-200/50">
    <div class="mb-8 px-2">
        <h2 class="text-[10px] font-extrabold text-slate-400 uppercase tracking-widest">{{ __('messages.menu_navigation') }}</h2>
    </div>

    <nav class="flex-1 space-y-2">
        @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'bg-white shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-slate-100 text-blue-700' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900 border border-transparent' }} flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 group">
                <div class="p-2 rounded-xl {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-400 group-hover:bg-white group-hover:text-blue-500 group-hover:shadow-sm' }} mr-3 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                {{ __('messages.dashboard_admin') }}
            </a>
            <!-- other admin links here -->
        @elseif(Auth::user()->isPetugas())
            <a href="{{ route('petugas.dashboard') }}" class="{{ request()->routeIs('petugas.dashboard') ? 'bg-white shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-slate-100 text-blue-700' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900 border border-transparent' }} flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 group">
                <div class="p-2 rounded-xl {{ request()->routeIs('petugas.dashboard') ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-400 group-hover:bg-white group-hover:text-blue-500 group-hover:shadow-sm' }} mr-3 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                {{ __('messages.dashboard_petugas') }}
            </a>
            <!-- other petugas links here -->
        @else
            <a href="{{ route('user.dashboard') }}" class="{{ request()->routeIs('user.dashboard') ? 'bg-white shadow-[0_4px_20px_rgb(0,0,0,0.03)] border border-slate-100 text-blue-700' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900 border border-transparent' }} flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 group">
                <div class="p-2 rounded-xl {{ request()->routeIs('user.dashboard') ? 'bg-blue-50 text-blue-600' : 'bg-slate-100 text-slate-400 group-hover:bg-white group-hover:text-blue-500 group-hover:shadow-sm' }} mr-3 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                {{ __('messages.dashboard_user') }}
            </a>
            <a href="#" class="text-slate-500 hover:bg-white/60 hover:text-slate-900 border border-transparent flex items-center px-4 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 group">
                <div class="p-2 rounded-xl bg-slate-100 text-slate-400 group-hover:bg-white group-hover:text-blue-500 group-hover:shadow-sm mr-3 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                </div>
                {{ __('messages.write_complaint') }}
            </a>
        @endif
    </nav>

    <!-- User Info bottom of sidebar -->
    <div class="mt-auto pt-6 border-t border-slate-200/50">
        <div class="flex items-center px-2">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-slate-200 to-slate-100 border border-white shadow-sm flex items-center justify-center font-bold text-slate-600 shrink-0 relative">
                {{ substr(Auth::user()->name, 0, 1) }}
                <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-400 border-2 border-white rounded-full"></div>
            </div>
            <div class="ml-3 overflow-hidden">
                <p class="text-sm font-bold text-slate-800 truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs font-medium text-slate-400 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
    </div>
</div>
