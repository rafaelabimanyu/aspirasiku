@extends('layouts.app')

@section('content')
<div class="flex flex-col md:flex-row min-h-[calc(100vh-4rem)]">
    <!-- Sidebar Component -->
    <aside class="w-full md:w-64 bg-white border-r border-slate-200 shrink-0">
        @include('components.sidebar')
    </aside>

    <!-- Dashboard Main Content -->
    <div class="flex-1 overflow-y-auto bg-slate-50/50 p-4 sm:p-6 lg:p-8">
        @yield('dashboard_content')
    </div>
</div>
@endsection
