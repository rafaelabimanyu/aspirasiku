@extends('layouts.app')

@section('content')
<div class="relative bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 pt-20">
            <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                <div class="sm:text-center lg:text-left">
                    <h1 class="text-4xl tracking-tight font-extrabold text-slate-900 sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Layanan Pengaduan dan</span>
                        <span class="block text-blue-600 xl:inline">Aspirasi Masyarakat</span>
                    </h1>
                    <p class="mt-3 text-base text-slate-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                        Sampaikan laporan Anda terkait layanan publik, infrastruktur, kesehatan, dan keamanan. Kami siap menindaklanjuti setiap aspirasi untuk lingkungan yang lebih baik.
                    </p>
                    <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                        <div class="rounded-md shadow">
                            <a href="{{ route('register') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 md:py-4 md:text-lg md:px-10 transition-colors">
                                Buat Laporan Sekarang
                            </a>
                        </div>
                        <div class="mt-3 sm:mt-0 sm:ml-3">
                            <a href="{{ route('login') }}" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 md:py-4 md:text-lg md:px-10 transition-colors">
                                Masuk ke Akun
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
        <div class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full bg-slate-100 flex items-center justify-center">
            <svg class="w-32 h-32 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
            </svg>
        </div>
    </div>
</div>

<div class="bg-slate-50 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-base font-semibold text-blue-600 tracking-wide uppercase">Cara Kerja</h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                Tiga Langkah Mudah
            </p>
            <p class="mt-4 max-w-2xl text-xl text-slate-500 mx-auto">
                Proses pengaduan yang transparan, mudah, dan cepat.
            </p>
        </div>

        <div class="mt-10">
            <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                            1
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Tulis Laporan</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">
                        Laporkan keluhan atau aspirasi Anda dengan jelas dan lengkapi dengan foto pendukung jika ada.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                            2
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Proses Verifikasi</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">
                        Laporan Anda akan diverifikasi dan diteruskan ke instansi terkait oleh tim petugas kami.
                    </dd>
                </div>

                <div class="relative">
                    <dt>
                        <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-blue-600 text-white">
                            3
                        </div>
                        <p class="ml-16 text-lg leading-6 font-medium text-slate-900">Tindak Lanjut</p>
                    </dt>
                    <dd class="mt-2 ml-16 text-base text-slate-500">
                        Anda bisa memantau status laporan dan memberikan umpan balik (feedback) atas tanggapan yang diberikan.
                    </dd>
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
