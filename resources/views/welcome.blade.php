@extends('layouts.app')

@section('title', 'Aspirasiku - Layanan Pengaduan Masyarakat')

@section('content')
<!-- Hero Section -->
<div class="relative bg-white overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-slate-800 mix-blend-multiply" aria-hidden="true"></div>
    </div>
    <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            {{ __('messages.hero_title') }}
        </h1>
        <p class="mt-6 max-w-3xl text-xl text-blue-100">
            {{ __('messages.hero_subtitle') }}
        </p>
        <div class="mt-10 flex gap-4">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-lg text-blue-700 bg-white hover:bg-blue-50 shadow-lg hover:shadow-xl transition-all duration-300">
                {{ __('messages.start_complaint') }}
            </a>
        </div>
    </div>
</div>

<!-- Interactive Statistics Section -->
<div class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-3">
            <!-- Stat 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">{{ __('messages.total_complaints') }}</p>
                        <p class="mt-2 text-4xl font-extrabold text-blue-600">{{ $stats['total_complaints'] }}</p>
                    </div>
                    <div class="p-3 bg-blue-50 rounded-xl">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Stat 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">{{ __('messages.resolved_complaints') }}</p>
                        <p class="mt-2 text-4xl font-extrabold text-emerald-600">{{ $stats['resolved_complaints'] }}</p>
                    </div>
                    <div class="p-3 bg-emerald-50 rounded-xl">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Stat 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-sm border border-slate-100 hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-slate-500 uppercase tracking-wider">{{ __('messages.active_users') }}</p>
                        <p class="mt-2 text-4xl font-extrabold text-purple-600">{{ $stats['total_users'] }}</p>
                    </div>
                    <div class="p-3 bg-purple-50 rounded-xl">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Public Complaints Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-slate-900 mb-8">{{ __('messages.public_complaints') }}</h2>
        
        @if($publicComplaints->isEmpty())
            <div class="text-center py-12 bg-slate-50 rounded-2xl border border-slate-100">
                <p class="text-slate-500">{{ __('messages.no_complaints') }}</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($publicComplaints as $complaint)
                    <div class="bg-white rounded-xl border border-slate-200 overflow-hidden hover:shadow-md transition-shadow">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <span class="px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                    {{ $complaint->category->name }}
                                </span>
                                <span class="text-sm text-slate-500">
                                    {{ $complaint->complaint_date->diffForHumans() }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2 line-clamp-2">
                                {{ $complaint->title }}
                            </h3>
                            <p class="text-slate-600 text-sm line-clamp-3 mb-4">
                                {{ $complaint->content }}
                            </p>
                            
                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-600 font-bold text-xs">
                                        {{ substr($complaint->user->name, 0, 1) }}
                                    </div>
                                    <span class="text-sm font-medium text-slate-700">{{ $complaint->user->name }}</span>
                                </div>
                                
                                @if($complaint->status == 'resolved')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700">
                                        {{ __('messages.status_resolved') }}
                                    </span>
                                @elseif($complaint->status == 'process')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700">
                                        {{ __('messages.status_process') }}
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-700">
                                        {{ __('messages.status_pending') }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
