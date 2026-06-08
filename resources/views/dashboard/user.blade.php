@extends('layouts.app')

@section('title', __('messages.dashboard_user'))

@section('content')
<div class="flex h-[calc(100vh-64px)] overflow-hidden">
    <!-- Sidebar -->
    <div class="w-64 border-r border-slate-200 hidden md:block flex-shrink-0">
        @include('components.sidebar')
    </div>

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto bg-slate-50 p-4 sm:p-6 lg:p-8">
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border-l-4 border-emerald-500 p-4 rounded-r-lg shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-emerald-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-emerald-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Form Pengaduan -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                            {{ __('messages.write_new_complaint') }}
                        </h3>
                    </div>
                    <div class="p-6">
                        <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
                            @csrf
                            
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-slate-700 mb-1">{{ __('messages.complaint_title') }}</label>
                                <input type="text" name="title" id="title" required value="{{ old('title') }}" placeholder="{{ __('messages.title_placeholder') }}" class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition-colors">
                                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Category -->
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-slate-700 mb-1">{{ __('messages.category') }}</label>
                                <select name="category_id" id="category_id" required class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition-colors">
                                    <option value="">-- {{ __('messages.select_category') }} --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-slate-700 mb-1">{{ __('messages.complaint_content') }}</label>
                                <textarea name="content" id="content" rows="4" required placeholder="{{ __('messages.description_placeholder') }}" class="w-full rounded-lg border-slate-300 focus:border-blue-500 focus:ring-blue-500 sm:text-sm transition-colors">{{ old('content') }}</textarea>
                                @error('content') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Attachment (Drag & Drop UI) -->
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">{{ __('messages.attachment') }}</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-xl hover:border-blue-500 transition-colors bg-slate-50 relative group cursor-pointer" onclick="document.getElementById('attachment').click()">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-10 w-10 text-slate-400 group-hover:text-blue-500 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-slate-600 justify-center">
                                            <span class="relative cursor-pointer rounded-md font-medium text-blue-600 hover:text-blue-500">
                                                {{ __('messages.drag_drop') }}
                                            </span>
                                        </div>
                                        <p class="text-xs text-slate-500">{{ __('messages.max_file_size') }}</p>
                                    </div>
                                    <input id="attachment" name="attachment" type="file" class="sr-only" accept="image/*">
                                </div>
                                <div id="file-name-display" class="mt-2 text-sm text-slate-600 font-medium hidden"></div>
                                @error('attachment') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>

                            <!-- Is Private -->
                            <div class="flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="is_private" name="is_private" type="checkbox" value="1" {{ old('is_private') ? 'checked' : '' }} class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-slate-300 rounded">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="is_private" class="font-medium text-slate-700">{{ __('messages.is_private_label') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                                {{ __('messages.submit_complaint') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Right Column: Riwayat Laporan -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden h-full flex flex-col">
                    <div class="px-6 py-5 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-slate-800 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                            {{ __('messages.my_complaint_history') }}
                        </h3>
                    </div>
                    
                    <div class="p-6 flex-1 overflow-y-auto bg-slate-50">
                        @if($complaints->isEmpty())
                            <div class="text-center py-16">
                                <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                </svg>
                                <h3 class="mt-2 text-sm font-medium text-slate-900">{{ __('messages.no_complaints') }}</h3>
                            </div>
                        @else
                            <div class="space-y-4">
                                @foreach($complaints as $complaint)
                                    <a href="{{ route('complaints.show', $complaint->id) }}" class="block bg-white rounded-xl border border-slate-200 p-5 hover:border-blue-300 hover:shadow-md transition-all">
                                        <div class="flex items-start justify-between">
                                            <div class="flex-1 min-w-0 pr-4">
                                                <div class="flex items-center gap-2 mb-1">
                                                    <span class="px-2.5 py-0.5 rounded-md text-xs font-medium bg-blue-50 text-blue-700">
                                                        {{ $complaint->category->name }}
                                                    </span>
                                                    <span class="text-xs text-slate-500">{{ $complaint->complaint_date->format('d M Y, H:i') }}</span>
                                                    @if($complaint->is_private)
                                                        <span class="text-xs text-slate-400 flex items-center gap-1">
                                                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                                            Privat
                                                        </span>
                                                    @endif
                                                </div>
                                                <h4 class="text-base font-bold text-slate-900 mb-1 truncate">{{ $complaint->title }}</h4>
                                                <p class="text-sm text-slate-600 line-clamp-2">{{ $complaint->content }}</p>
                                            </div>
                                            
                                            <!-- Badge Status -->
                                            <div class="flex-shrink-0">
                                                @if($complaint->status == 'resolved')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                                        {{ __('messages.status_resolved') }}
                                                    </span>
                                                @elseif($complaint->status == 'process')
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-amber-50 text-amber-700 border border-amber-100">
                                                        {{ __('messages.status_process') }}
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                                        {{ __('messages.status_pending') }}
                                                    </span>
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

<script>
    // Simple script to show selected file name
    document.getElementById('attachment').addEventListener('change', function(e) {
        var fileName = e.target.files[0] ? e.target.files[0].name : '';
        var display = document.getElementById('file-name-display');
        if (fileName) {
            display.textContent = 'File: ' + fileName;
            display.classList.remove('hidden');
        } else {
            display.classList.add('hidden');
        }
    });
</script>
@endsection
