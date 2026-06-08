@extends('layouts.dashboard')

@section('title', 'Dashboard Petugas - Aspirasiku')

@section('dashboard_content')
<div class="mb-8">
    <h1 class="text-2xl font-bold text-slate-900">Dashboard Petugas</h1>
    <p class="text-slate-500 mt-1">Selamat bekerja, {{ Auth::user()->name }}! Ada laporan yang perlu ditindaklanjuti hari ini.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Stat Cards -->
    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-lg bg-blue-50 text-blue-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-slate-500">Total Laporan Diproses</p>
                <p class="text-2xl font-semibold text-slate-900">{{ $stats['processed_complaints'] ?? 0 }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
        <div class="flex items-center">
            <div class="p-3 rounded-lg bg-emerald-50 text-emerald-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-slate-500">Laporan Selesai</p>
                <p class="text-2xl font-semibold text-slate-900">{{ $stats['completed_complaints'] ?? 0 }}</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-medium text-slate-900">Perlu Tindakan Segera</h2>
        <a href="#" class="text-sm font-medium text-blue-600 hover:text-blue-500">Lihat Semua &rarr;</a>
    </div>
    
    <div class="text-center py-8 text-slate-500 border border-dashed border-slate-300 rounded-lg">
        <svg class="mx-auto h-12 w-12 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-slate-900">Tidak ada tugas</h3>
        <p class="mt-1 text-sm text-slate-500">Semua laporan telah ditindaklanjuti dengan baik.</p>
    </div>
</div>
@endsection
