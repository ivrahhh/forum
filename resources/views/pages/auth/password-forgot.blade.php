@extends('layouts.authentication')

@section('content')
    <x-card widht="2xl">
        <form method="POST" action="{{ route('password.email') }}" class="space-y-4">
            <p class="text-sm">Forgot your password ? No problem ! You can reset your password by requesting a reset link. Just put your email address at the field below, just make sure that the email address that you will provide is registered to this website. </p>
            @session('status')
                <x-alert :message="session('status')" type="success" />
            @endsession
            <div>
                <x-label for="email" :value="__('Email Address')" />
                <x-input type="email" id="email" name="email" :value="old('email')" />
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <x-submit :label="__('Request Reset Link')"/>
        </form>
    </x-card>
@endsection