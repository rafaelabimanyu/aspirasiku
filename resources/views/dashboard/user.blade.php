@extends('layouts.app')

@section('title', __('messages.dashboard_user'))

@section('content')
<div class="flex h-[calc(100vh-80px)] overflow-hidden bg-[#f8fafc]">
    <!-- Sidebar -->
    <div class="w-72 hidden md:block flex-shrink-0 z-10 relative">
        @include('components.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto px-4 py-8 sm:px-10 sm:py-12 relative">
        
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="mb-10">
                <h1 class="text-3xl font-black text-slate-800 tracking-tight">{{ __('messages.dashboard_user') }}</h1>
                <p class="mt-2 text-slate-500 font-medium">Sampaikan keluhan Anda dan pantau proses penanganannya di sini.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
                
                <!-- Left Column: Form Pengaduan -->
                <div class="lg:col-span-5 relative z-10">
                    <div class="bg-white/80 backdrop-blur-2xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-white overflow-hidden group hover:shadow-[0_20px_60px_rgba(0,0,0,0.06)] transition-all duration-500">
                        <div class="px-8 py-6 border-b border-slate-100">
                            <h3 class="text-lg font-bold text-slate-800">{{ __('messages.write_new_complaint') }}</h3>
                        </div>
                        <div class="p-8">
                            <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                                @csrf
                                
                                <!-- Title -->
                                <div>
                                    <label for="title" class="block text-[13px] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('messages.complaint_title') }}</label>
                                    <input type="text" name="title" id="title" required value="{{ old('title') }}" placeholder="{{ __('messages.title_placeholder') }}" class="w-full rounded-2xl border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 px-4 py-3 sm:text-sm transition-all duration-300 outline-none">
                                    @error('title') <p class="mt-2 text-xs font-semibold text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <!-- Category -->
                                <div>
                                    <label for="category_id" class="block text-[13px] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('messages.category') }}</label>
                                    <select name="category_id" id="category_id" required class="w-full rounded-2xl border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 px-4 py-3 sm:text-sm transition-all duration-300 outline-none appearance-none">
                                        <option value="">-- {{ __('messages.select_category') }} --</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <p class="mt-2 text-xs font-semibold text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <!-- Content -->
                                <div>
                                    <label for="content" class="block text-[13px] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('messages.complaint_content') }}</label>
                                    <textarea name="content" id="content" rows="4" required placeholder="{{ __('messages.description_placeholder') }}" class="w-full rounded-2xl border-slate-200 bg-slate-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 px-4 py-3 sm:text-sm transition-all duration-300 outline-none resize-none">{{ old('content') }}</textarea>
                                    @error('content') <p class="mt-2 text-xs font-semibold text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <!-- Attachment (Futuristic Dropzone) -->
                                <div>
                                    <label class="block text-[13px] font-bold text-slate-500 uppercase tracking-wider mb-2">{{ __('messages.attachment') }}</label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-200 border-dashed rounded-3xl hover:border-blue-400 hover:bg-blue-50/50 transition-all duration-500 bg-slate-50 relative group cursor-pointer" onclick="document.getElementById('attachment').click()">
                                        <div class="space-y-2 text-center">
                                            <div class="w-12 h-12 mx-auto bg-white rounded-full shadow-sm flex items-center justify-center text-slate-400 group-hover:text-blue-500 group-hover:scale-110 transition-all duration-500">
                                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                                                </svg>
                                            </div>
                                            <div class="flex text-sm text-slate-600 justify-center mt-2">
                                                <span class="font-semibold text-blue-600 group-hover:text-blue-700 transition-colors">
                                                    {{ __('messages.drag_drop') }}
                                                </span>
                                            </div>
                                            <p class="text-xs font-medium text-slate-400">{{ __('messages.max_file_size') }}</p>
                                        </div>
                                        <input id="attachment" name="attachment" type="file" class="sr-only" accept="image/*">
                                    </div>
                                    <div id="file-name-display" class="mt-3 text-sm text-blue-600 font-semibold hidden bg-blue-50 py-2 px-4 rounded-xl inline-block"></div>
                                    @error('attachment') <p class="mt-2 text-xs font-semibold text-red-500">{{ $message }}</p> @enderror
                                </div>

                                <!-- Is Private -->
                                <div class="flex items-center gap-3 bg-slate-50 p-4 rounded-2xl border border-slate-100">
                                    <div class="relative flex items-center justify-center">
                                        <input id="is_private" name="is_private" type="checkbox" value="1" {{ old('is_private') ? 'checked' : '' }} class="peer appearance-none w-5 h-5 border-2 border-slate-300 rounded-md checked:bg-blue-600 checked:border-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all cursor-pointer">
                                        <svg class="absolute w-3 h-3 text-white pointer-events-none opacity-0 peer-checked:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                    </div>
                                    <label for="is_private" class="text-sm font-semibold text-slate-700 cursor-pointer select-none">{{ __('messages.is_private_label') }}</label>
                                </div>

                                <button type="submit" class="w-full flex justify-center items-center gap-2 py-4 px-4 border border-transparent rounded-2xl shadow-[0_8px_20px_rgba(37,99,235,0.2)] text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 hover:-translate-y-0.5 hover:shadow-[0_10px_25px_rgba(37,99,235,0.3)] focus:outline-none focus:ring-4 focus:ring-blue-500/30 transition-all duration-500">
                                    {{ __('messages.submit_complaint') }}
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Riwayat Laporan -->
                <div class="lg:col-span-7">
                    <div class="bg-white/80 backdrop-blur-2xl rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.03)] border border-white flex flex-col h-[calc(100vh-200px)] lg:h-[800px] hover:shadow-[0_20px_60px_rgba(0,0,0,0.06)] transition-all duration-500">
                        <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-white/50 rounded-t-3xl backdrop-blur-sm">
                            <h3 class="text-lg font-bold text-slate-800">{{ __('messages.my_complaint_history') }}</h3>
                        </div>
                        
                        <div class="p-8 flex-1 overflow-y-auto">
                            @if($complaints->isEmpty())
                                <div class="h-full flex flex-col items-center justify-center text-center">
                                    <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mb-4">
                                        <svg class="h-10 w-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-base font-bold text-slate-800 mb-1">{{ __('messages.no_complaints') }}</h3>
                                    <p class="text-sm text-slate-500">Mulai tulis pengaduan pertama Anda di form sebelah kiri.</p>
                                </div>
                            @else
                                <div class="space-y-5">
                                    @foreach($complaints as $complaint)
                                        <a href="{{ route('complaints.show', $complaint->id) }}" class="group block bg-white rounded-3xl border border-slate-100 p-6 shadow-sm hover:shadow-[0_10px_40px_rgba(0,0,0,0.06)] hover:-translate-y-1 hover:border-blue-100 transition-all duration-500">
                                            <div class="flex items-start justify-between">
                                                <div class="flex-1 min-w-0 pr-6">
                                                    <div class="flex items-center gap-3 mb-3">
                                                        <span class="px-3 py-1 rounded-lg text-[11px] font-bold uppercase tracking-wider bg-slate-50 text-slate-500 border border-slate-200 group-hover:bg-blue-50 group-hover:border-blue-200 group-hover:text-blue-700 transition-colors duration-300">
                                                            {{ $complaint->category->name }}
                                                        </span>
                                                        <span class="text-xs font-semibold text-slate-400">{{ $complaint->complaint_date->format('d M Y, H:i') }}</span>
                                                        @if($complaint->is_private)
                                                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                                                            <span class="text-xs font-semibold text-amber-500 flex items-center gap-1">
                                                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                                Privat
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <h4 class="text-lg font-bold text-slate-800 mb-2 truncate group-hover:text-blue-600 transition-colors duration-300">{{ $complaint->title }}</h4>
                                                    <p class="text-sm text-slate-500 line-clamp-2 leading-relaxed">{{ $complaint->content }}</p>
                                                </div>
                                                
                                                <!-- Minimalist Status Dot -->
                                                <div class="flex-shrink-0 pt-1">
                                                    @if($complaint->status == 'resolved')
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-xs font-bold text-emerald-600 uppercase tracking-widest hidden sm:block">{{ __('messages.status_resolved') }}</span>
                                                            <span class="w-3.5 h-3.5 rounded-full bg-emerald-500 shadow-[0_0_12px_rgba(16,185,129,0.6)]"></span>
                                                        </div>
                                                    @elseif($complaint->status == 'process')
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-xs font-bold text-amber-500 uppercase tracking-widest hidden sm:block">{{ __('messages.status_process') }}</span>
                                                            <span class="w-3.5 h-3.5 rounded-full bg-amber-500 shadow-[0_0_12px_rgba(245,158,11,0.6)]"></span>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center gap-2">
                                                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest hidden sm:block">{{ __('messages.status_pending') }}</span>
                                                            <span class="w-3.5 h-3.5 rounded-full bg-slate-300"></span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('attachment').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : '';
        var display = document.getElementById('file-name-display');
        if (fileName) {
            display.textContent = 'Terlampir: ' + fileName;
            display.classList.remove('hidden');
        } else {
            display.classList.add('hidden');
        }
    });
</script>
@endsection
