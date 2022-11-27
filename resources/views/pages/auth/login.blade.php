@extends('layouts.authentication')

@section('content')
    <x-card width="2xl">
        <form method="POST" action="{{ route('login.auth') }}" class="space-y-4">
            @session('status')
                <x-alert :message="session('status')" type="success" />
            @endsession
            <div>
                <x-label for="email" :value="__('Email Address')" />
                <x-input  type="email" id="username" name="email" :value="old('email')"/>
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <div class="flex justify-between items-center">
                    <x-label for="password" :value="__('Password')" />
                    <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline" tabindex="-1">Forgot Password ?</a>
                </div>
                <x-input type="password" id="password" name="password" />
                @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <x-submit :label="__('Log in')"/>
        </form>
    </x-card>
    <div class="mt-8 p-4 rounded-lg w-96 text-center border border-gray-300">
        <span class="text-sm">
            Dont have an account yet ?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Create an account.</a>
        </span>
    </div>
@endsection