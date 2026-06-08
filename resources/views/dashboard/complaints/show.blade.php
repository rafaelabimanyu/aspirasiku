@extends('layouts.app')

@section('title', __('messages.detail_complaint'))

@section('content')
<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <a href="{{ url()->previous() }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-blue-600 transition-colors">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            {{ __('messages.back') }}
        </a>
        <h1 class="text-2xl font-bold text-slate-900">{{ __('messages.detail_complaint') }}</h1>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Content Area -->
        <div class="p-6 sm:p-8 border-b border-slate-100">
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="px-3 py-1 rounded-md text-xs font-semibold bg-blue-50 text-blue-700 uppercase tracking-wider">
                    {{ $complaint->category->name }}
                </span>
                <span class="text-sm text-slate-500 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $complaint->complaint_date->format('d M Y, H:i') }}
                </span>
                
                @if($complaint->is_private)
                    <span class="text-sm text-amber-600 bg-amber-50 px-2.5 py-0.5 rounded-md font-medium flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Laporan Privat
                    </span>
                @endif
            </div>

            <h2 class="text-2xl font-extrabold text-slate-900 mb-4">{{ $complaint->title }}</h2>
            
            <div class="prose prose-slate max-w-none text-slate-700">
                <p class="whitespace-pre-wrap">{{ $complaint->content }}</p>
            </div>

            @if($complaint->attachment)
                <div class="mt-6">
                    <h4 class="text-sm font-semibold text-slate-900 mb-3">Lampiran Bukti</h4>
                    <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="block w-full sm:w-1/2 md:w-1/3 rounded-xl overflow-hidden border border-slate-200 hover:opacity-90 hover:shadow-md transition-all">
                        <img src="{{ asset('storage/' . $complaint->attachment) }}" alt="Lampiran" class="w-full h-auto object-cover">
                    </a>
                </div>
            @endif
        </div>

        <!-- Timeline Section -->
        <div class="bg-slate-50 p-6 sm:p-8">
            <h3 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ __('messages.complaint_timeline') }}
            </h3>

            <div class="relative border-l-2 border-slate-200 ml-3 md:ml-4 space-y-8">
                
                <!-- 1. Pending (Diterima) -->
                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full border-2 {{ in_array($complaint->status, ['pending', 'process', 'resolved']) ? 'bg-blue-600 border-blue-600' : 'bg-white border-slate-300' }}"></div>
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start">
                        <div>
                            <h4 class="text-base font-bold text-slate-900">{{ __('messages.timeline_pending') }}</h4>
                            <p class="text-sm text-slate-600 mt-1">{{ __('messages.timeline_pending_desc') }}</p>
                        </div>
                        <span class="text-xs font-medium text-slate-500 mt-2 sm:mt-0">{{ $complaint->complaint_date->format('d M Y, H:i') }}</span>
                    </div>
                </div>

                <!-- 2. Proses -->
                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full border-2 {{ in_array($complaint->status, ['process', 'resolved']) ? 'bg-amber-500 border-amber-500' : 'bg-white border-slate-300' }}"></div>
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start">
                        <div>
                            <h4 class="text-base font-bold {{ in_array($complaint->status, ['process', 'resolved']) ? 'text-slate-900' : 'text-slate-400' }}">{{ __('messages.timeline_process') }}</h4>
                            <p class="text-sm {{ in_array($complaint->status, ['process', 'resolved']) ? 'text-slate-600' : 'text-slate-400' }} mt-1">{{ __('messages.timeline_process_desc') }}</p>
                        </div>
                    </div>
                </div>

                <!-- 3. Selesai (Tanggapan) -->
                <div class="relative pl-8">
                    <div class="absolute -left-[9px] top-1 w-4 h-4 rounded-full border-2 {{ $complaint->status == 'resolved' ? 'bg-emerald-500 border-emerald-500' : 'bg-white border-slate-300' }}"></div>
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start">
                        <div class="w-full">
                            <h4 class="text-base font-bold {{ $complaint->status == 'resolved' ? 'text-slate-900' : 'text-slate-400' }}">{{ __('messages.timeline_resolved') }}</h4>
                            <p class="text-sm {{ $complaint->status == 'resolved' ? 'text-slate-600' : 'text-slate-400' }} mt-1">{{ __('messages.timeline_resolved_desc') }}</p>
                            
                            @if($complaint->response)
                                <div class="mt-4 bg-white border border-slate-200 rounded-xl p-4 shadow-sm relative">
                                    <!-- Triangle pointer -->
                                    <div class="absolute -top-2 left-6 w-4 h-4 bg-white border-t border-l border-slate-200 transform rotate-45"></div>
                                    
                                    <div class="flex items-center gap-2 mb-2">
                                        <div class="w-6 h-6 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-700 font-bold text-xs">
                                            {{ substr($complaint->response->user->name, 0, 1) }}
                                        </div>
                                        <span class="text-sm font-semibold text-slate-800">{{ $complaint->response->user->name }}</span>
                                        <span class="text-xs text-slate-500 px-2 py-0.5 rounded bg-slate-100">{{ $complaint->response->user->role }}</span>
                                    </div>
                                    <p class="text-sm text-slate-700 whitespace-pre-wrap">{{ $complaint->response->content }}</p>
                                    <p class="text-xs text-slate-400 mt-3">{{ $complaint->response->response_date->format('d M Y, H:i') }}</p>
                                </div>
                            @elseif($complaint->status == 'resolved')
                                <div class="mt-4 p-4 bg-slate-100 rounded-lg text-sm text-slate-500 italic">
                                    {{ __('messages.no_response_yet') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
