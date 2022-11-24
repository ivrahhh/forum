@extends('layouts.authentication')

@section('content')
    <x-card width="2xl">
        <form method="POST" action="{{ route('password.update') }}" class="space-y-4">
            @method('PUT')
            <input type="hidden" name="token" value="{{ $token }}">
            <div>
                <x-label for="email" :value="__('Email Address')" />
                <x-input type="email" id="email" name="email" :value="old('email', $email)" readonly />
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label for="password" :value="__('New Password')" />
                <x-input type="password" id="password" name="password" />
                @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-input type="password" id="password_confirmation" name="password_confirmation"/>
            </div>
            <x-submit :label="__('Reset Password')" />
        </form>
    </x-card>
@endsection