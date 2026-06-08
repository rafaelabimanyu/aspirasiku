@extends('layouts.app')

@section('title', __('messages.detail_complaint'))

@section('content')
<div class="max-w-4xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <!-- Header -->
    <div class="mb-10 flex items-center justify-between">
        <a href="{{ url()->previous() }}" class="group inline-flex items-center justify-center w-10 h-10 rounded-full bg-white border border-slate-200 shadow-sm hover:border-blue-300 hover:shadow-md transition-all duration-300">
            <svg class="w-5 h-5 text-slate-400 group-hover:text-blue-600 group-hover:-translate-x-0.5 transition-all duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
        </a>
    </div>

    <!-- Main Content Card -->
    <div class="bg-white/80 backdrop-blur-2xl rounded-[2rem] shadow-[0_20px_50px_rgba(0,0,0,0.04)] border border-white overflow-hidden">
        <div class="p-8 sm:p-12">
            <!-- Badges & Meta -->
            <div class="flex flex-wrap items-center gap-4 mb-8">
                <span class="px-4 py-1.5 rounded-xl text-xs font-bold uppercase tracking-wider bg-slate-50 text-slate-500 border border-slate-200">
                    {{ $complaint->category->name }}
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                <span class="text-sm font-medium text-slate-500">
                    {{ $complaint->complaint_date->format('d M Y, H:i') }}
                </span>
                
                @if($complaint->is_private)
                    <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                    <span class="text-sm text-amber-500 font-semibold flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        Laporan Privat
                    </span>
                @endif
            </div>

            <!-- Title & Content -->
            <h1 class="text-3xl sm:text-4xl font-black text-slate-800 tracking-tight mb-6">{{ $complaint->title }}</h1>
            <div class="prose prose-lg prose-slate max-w-none text-slate-600 leading-relaxed mb-10">
                <p class="whitespace-pre-wrap">{{ $complaint->content }}</p>
            </div>

            <!-- Attachment -->
            @if($complaint->attachment)
                <div class="mt-8 rounded-2xl overflow-hidden border border-slate-100 bg-slate-50 p-2 sm:p-4 inline-block max-w-full">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-3 px-2">Lampiran Bukti</p>
                    <a href="{{ asset('storage/' . $complaint->attachment) }}" target="_blank" class="block rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-shadow">
                        <img src="{{ asset('storage/' . $complaint->attachment) }}" alt="Lampiran" class="max-w-full h-auto max-h-96 object-contain">
                    </a>
                </div>
            @endif
        </div>

        <!-- iOS/macOS Minimalist Timeline -->
        <div class="bg-slate-50/50 p-8 sm:p-12 border-t border-slate-100">
            <h3 class="text-[11px] font-extrabold text-slate-400 uppercase tracking-widest mb-8">{{ __('messages.complaint_timeline') }}</h3>

            <div class="relative max-w-2xl">
                <!-- Vertical Line (Very thin) -->
                <div class="absolute left-3 top-2 bottom-2 w-px bg-slate-200 rounded-full"></div>
                
                <div class="space-y-10 relative">
                    <!-- 1. Diterima -->
                    <div class="flex gap-6 group">
                        <div class="relative z-10 flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full border-[3px] flex items-center justify-center {{ in_array($complaint->status, ['pending', 'process', 'resolved']) ? 'bg-white border-blue-500 shadow-[0_0_12px_rgba(59,130,246,0.4)]' : 'bg-slate-50 border-slate-300' }} transition-all duration-500">
                                @if(in_array($complaint->status, ['pending', 'process', 'resolved']))
                                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 pb-1">
                            <div class="flex items-center justify-between mb-1">
                                <h4 class="text-base font-bold text-slate-800">{{ __('messages.timeline_pending') }}</h4>
                                <span class="text-[11px] font-semibold text-slate-400">{{ $complaint->complaint_date->format('d M, H:i') }}</span>
                            </div>
                            <p class="text-sm text-slate-500 leading-relaxed">{{ __('messages.timeline_pending_desc') }}</p>
                        </div>
                    </div>

                    <!-- 2. Diproses -->
                    <div class="flex gap-6 group">
                        <div class="relative z-10 flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full border-[3px] flex items-center justify-center {{ in_array($complaint->status, ['process', 'resolved']) ? 'bg-white border-amber-500 shadow-[0_0_12px_rgba(245,158,11,0.4)]' : 'bg-slate-50 border-slate-200' }} transition-all duration-500">
                                @if(in_array($complaint->status, ['process', 'resolved']))
                                    <div class="w-2 h-2 rounded-full bg-amber-500"></div>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 pb-1">
                            <h4 class="text-base font-bold {{ in_array($complaint->status, ['process', 'resolved']) ? 'text-slate-800' : 'text-slate-400' }} mb-1">{{ __('messages.timeline_process') }}</h4>
                            <p class="text-sm {{ in_array($complaint->status, ['process', 'resolved']) ? 'text-slate-500' : 'text-slate-400' }} leading-relaxed">{{ __('messages.timeline_process_desc') }}</p>
                        </div>
                    </div>

                    <!-- 3. Selesai & Tanggapan -->
                    <div class="flex gap-6 group">
                        <div class="relative z-10 flex-shrink-0 mt-1">
                            <div class="w-6 h-6 rounded-full border-[3px] flex items-center justify-center {{ $complaint->status == 'resolved' ? 'bg-white border-emerald-500 shadow-[0_0_12px_rgba(16,185,129,0.4)]' : 'bg-slate-50 border-slate-200' }} transition-all duration-500">
                                @if($complaint->status == 'resolved')
                                    <div class="w-2 h-2 rounded-full bg-emerald-500"></div>
                                @endif
                            </div>
                        </div>
                        <div class="flex-1 pb-1">
                            <h4 class="text-base font-bold {{ $complaint->status == 'resolved' ? 'text-slate-800' : 'text-slate-400' }} mb-1">{{ __('messages.timeline_resolved') }}</h4>
                            <p class="text-sm {{ $complaint->status == 'resolved' ? 'text-slate-500' : 'text-slate-400' }} leading-relaxed">{{ __('messages.timeline_resolved_desc') }}</p>
                            
                            @if($complaint->response)
                                <!-- Mac OS Style Message Bubble -->
                                <div class="mt-6 bg-white border border-slate-100 rounded-[1.25rem] p-6 shadow-[0_10px_30px_rgba(0,0,0,0.03)] relative animate-[slideDown_0.5s_ease-out_forwards]">
                                    <!-- Tail of the bubble -->
                                    <div class="absolute -top-2.5 left-8 w-5 h-5 bg-white border-t border-l border-slate-100 transform rotate-45"></div>
                                    
                                    <div class="flex items-center gap-3 mb-4">
                                        <div class="w-8 h-8 rounded-full bg-emerald-50 border border-emerald-100 flex items-center justify-center text-emerald-600 font-bold text-xs">
                                            {{ substr($complaint->response->user->name, 0, 1) }}
                                        </div>
                                        <div>
                                            <span class="block text-sm font-bold text-slate-800">{{ $complaint->response->user->name }}</span>
                                            <span class="block text-[10px] font-bold text-emerald-600 uppercase tracking-widest mt-0.5">{{ $complaint->response->user->role }}</span>
                                        </div>
                                        <div class="ml-auto text-[11px] font-semibold text-slate-400">
                                            {{ $complaint->response->response_date->format('d M, H:i') }}
                                        </div>
                                    </div>
                                    <div class="text-sm text-slate-600 leading-relaxed bg-slate-50/50 p-4 rounded-xl border border-slate-50">
                                        <p class="whitespace-pre-wrap">{{ $complaint->response->content }}</p>
                                    </div>
                                </div>
                            @elseif($complaint->status == 'resolved')
                                <div class="mt-5 px-5 py-4 bg-white rounded-2xl text-sm font-medium text-slate-400 italic border border-slate-100/50 shadow-sm">
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
