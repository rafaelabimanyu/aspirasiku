@extends('layouts.app')

@section('title', __('messages.login_title'))

@section('content')
<div class="min-h-[calc(100vh-130px)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-xl shadow-sm border border-slate-200">
        <div class="text-center mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                {{ __('messages.welcome_back') }}
            </h2>
            <p class="mt-2 text-sm text-slate-500">
                {{ __('messages.or') }}
                <a href="{{ route('register') }}" class="font-medium text-blue-600 hover:text-blue-500 transition-colors">
                    {{ __('messages.register_new_account') }}
                </a>
            </p>
        </div>

        <form class="space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            
            <div>
                <label for="username" class="block text-sm font-medium text-slate-700">
                    {{ __('messages.username') }}
                </label>
                <div class="mt-1">
                    <input id="username" name="username" type="text" autocomplete="username" required value="{{ old('username') }}" class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors">
                </div>
                @error('username')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-slate-700">
                    {{ __('messages.password') }}
                </label>
                <div class="mt-1">
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none block w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm placeholder-slate-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm transition-colors">
                </div>
                @error('password')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-slate-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-slate-700">
                        {{ __('messages.remember_me') }}
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                    {{ __('messages.login_button') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
