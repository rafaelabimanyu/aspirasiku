@extends('layouts.app')

@section('title', 'Aspirasiku - Layanan Pengaduan Masyarakat')

@section('content')
<!-- Full-Screen Hero Section -->
<div class="relative min-h-[90vh] flex items-center justify-center overflow-hidden bg-white">
    <!-- Abstract Blobs -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-400/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
    <div class="absolute top-1/3 right-1/4 w-96 h-96 bg-emerald-300/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
    <div class="absolute -bottom-32 left-1/2 w-96 h-96 bg-indigo-300/20 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-4000"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mt-[-10vh]">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-xs font-semibold text-slate-600 mb-8 tracking-wide">
            <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> Platform Resmi v2.0
        </div>
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8">
            <span class="block text-slate-900 mb-2">{{ __('messages.hero_title') }}</span>
            <span class="block text-transparent bg-clip-text bg-gradient-to-r from-blue-700 via-indigo-600 to-emerald-500 leading-tight">Bersama Membangun Negeri</span>
        </h1>
        <p class="mt-6 max-w-2xl mx-auto text-lg sm:text-xl font-medium text-slate-500 leading-relaxed">
            {{ __('messages.hero_subtitle') }}
        </p>
        <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('login') }}" class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white transition-all duration-500 bg-slate-900 rounded-2xl hover:bg-slate-800 hover:shadow-[0_0_40px_rgba(15,23,42,0.3)] hover:-translate-y-1 overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-indigo-600 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <span class="relative z-10 flex items-center gap-2">
                    {{ __('messages.start_complaint') }}
                    <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </span>
            </a>
            <a href="#statistik" class="inline-flex items-center justify-center px-8 py-4 text-base font-bold text-slate-700 transition-all duration-500 bg-white border border-slate-200 rounded-2xl hover:bg-slate-50 hover:shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:-translate-y-1">
                Lihat Statistik
            </a>
        </div>
    </div>
</div>

<!-- Floating Islands Statistics Section -->
<div id="statistik" class="relative bg-[#f8fafc] pt-10 pb-24 border-t border-white shadow-[inset_0_10px_20px_rgba(0,0,0,0.02)]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-20">
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
            <!-- Stat 1 -->
            <div class="bg-white/80 backdrop-blur-2xl rounded-3xl p-8 shadow-[0_20px_50px_rgba(8,112,184,0.07)] border border-white hover:shadow-[0_20px_60px_rgba(8,112,184,0.12)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-100 to-transparent rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">{{ __('messages.total_complaints') }}</p>
                        <p class="mt-2 text-5xl font-black text-slate-800">{{ $stats['total_complaints'] }}</p>
                    </div>
                    <div class="p-4 bg-gradient-to-br from-blue-50 to-blue-100/50 rounded-2xl border border-blue-100 shadow-inner group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="bg-white/80 backdrop-blur-2xl rounded-3xl p-8 shadow-[0_20px_50px_rgba(16,185,129,0.07)] border border-white hover:shadow-[0_20px_60px_rgba(16,185,129,0.12)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-emerald-100 to-transparent rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">{{ __('messages.resolved_complaints') }}</p>
                        <p class="mt-2 text-5xl font-black text-slate-800">{{ $stats['resolved_complaints'] }}</p>
                    </div>
                    <div class="p-4 bg-gradient-to-br from-emerald-50 to-emerald-100/50 rounded-2xl border border-emerald-100 shadow-inner group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white/80 backdrop-blur-2xl rounded-3xl p-8 shadow-[0_20px_50px_rgba(139,92,246,0.07)] border border-white hover:shadow-[0_20px_60px_rgba(139,92,246,0.12)] hover:-translate-y-2 transition-all duration-500 group relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-100 to-transparent rounded-full -mr-16 -mt-16 opacity-50 group-hover:scale-150 transition-transform duration-700"></div>
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-bold text-slate-400 uppercase tracking-widest">{{ __('messages.active_users') }}</p>
                        <p class="mt-2 text-5xl font-black text-slate-800">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="p-4 bg-gradient-to-br from-purple-50 to-purple-100/50 rounded-2xl border border-purple-100 shadow-inner group-hover:scale-110 transition-transform duration-500">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Minimalist Public Complaints Section -->
<div class="bg-white py-24 border-t border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">{{ __('messages.public_complaints') }}</h2>
            <div class="w-12 h-1 bg-blue-600 rounded-full mx-auto mt-4"></div>
        </div>
        
        @if($publicComplaints->isEmpty())
            <div class="text-center py-16 bg-slate-50/50 rounded-3xl border border-slate-100">
                <p class="text-slate-500 font-medium">{{ __('messages.no_complaints') }}</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($publicComplaints as $complaint)
                    <div class="bg-white rounded-3xl border border-slate-100 p-8 shadow-[0_8px_30px_rgb(0,0,0,0.02)] hover:shadow-[0_20px_50px_rgb(0,0,0,0.06)] hover:-translate-y-2 transition-all duration-500 flex flex-col h-full group">
                        <div class="flex items-center justify-between mb-6">
                            <span class="px-3 py-1.5 rounded-lg text-[11px] font-bold uppercase tracking-wider bg-slate-50 text-slate-600 border border-slate-200 group-hover:border-blue-200 group-hover:bg-blue-50 group-hover:text-blue-700 transition-colors duration-300">
                                {{ $complaint->category->name }}
                            </span>
                            <span class="text-xs font-semibold text-slate-400">
                                {{ $complaint->complaint_date->diffForHumans() }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-300">
                            {{ $complaint->title }}
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed line-clamp-3 mb-6 flex-1">
                            {{ $complaint->content }}
                        </p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-slate-100/80">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-tr from-slate-200 to-slate-100 border border-white shadow-sm flex items-center justify-center text-slate-600 font-bold text-sm">
                                    {{ substr($complaint->user->name, 0, 1) }}
                                </div>
                                <span class="text-sm font-semibold text-slate-700">{{ $complaint->user->name }}</span>
                            </div>
                            
                            @if($complaint->status == 'resolved')
                                <span class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_10px_rgba(16,185,129,0.5)]" title="{{ __('messages.status_resolved') }}"></span>
                            @elseif($complaint->status == 'process')
                                <span class="w-3 h-3 rounded-full bg-amber-500 shadow-[0_0_10px_rgba(245,158,11,0.5)]" title="{{ __('messages.status_process') }}"></span>
                            @else
                                <span class="w-3 h-3 rounded-full bg-slate-300" title="{{ __('messages.status_pending') }}"></span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    .animate-blob {
        animation: blob 7s infinite;
    }
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
@endsection
