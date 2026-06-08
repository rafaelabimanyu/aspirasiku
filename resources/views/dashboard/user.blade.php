@extends('layouts.dashboard')

@section('title', 'Dashboard Saya - Aspirasiku')

@section('dashboard_content')
<div class="mb-8 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Dashboard Saya</h1>
        <p class="text-slate-500 mt-1">Halo {{ Auth::user()->name }}, selamat datang di portal pengaduan masyarakat.</p>
    </div>
    <a href="#" class="inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
        </svg>
        Buat Pengaduan
    </a>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
        <p class="text-sm font-medium text-slate-500">Total Laporan</p>
        <p class="text-2xl font-semibold text-slate-900">{{ $stats['total_complaints'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
        <p class="text-sm font-medium text-slate-500">Menunggu</p>
        <p class="text-2xl font-semibold text-slate-900">{{ $stats['pending_complaints'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
        <p class="text-sm font-medium text-slate-500">Diproses</p>
        <p class="text-2xl font-semibold text-slate-900">{{ $stats['proses_complaints'] ?? 0 }}</p>
    </div>
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-4">
        <p class="text-sm font-medium text-slate-500">Selesai</p>
        <p class="text-2xl font-semibold text-slate-900">{{ $stats['selesai_complaints'] ?? 0 }}</p>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <h2 class="text-lg font-medium text-slate-900 mb-4">Riwayat Pengaduan Anda</h2>
    
    <div class="text-center py-12 text-slate-500 border border-dashed border-slate-300 rounded-lg">
        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-slate-900">Belum ada pengaduan</h3>
        <p class="mt-1 text-sm text-slate-500">Anda belum membuat pengaduan apapun. Klik tombol "Buat Pengaduan" untuk memulai.</p>
    </div>
</div>
@endsection
