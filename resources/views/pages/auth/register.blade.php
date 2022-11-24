@extends('layouts.authentication')

@section('content')
    <x-card widht="2xl">
        <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
            <div>
                <x-label id="email" :value="__('Email Address')" />
                <x-input type="email" id="email" name="email" :value="old('email')" />
                @error('email')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label id="password" :value="__('Password')" />
                <x-input type="password" id="password" name="password" />
                @error('password')
                    <span class="text-xs text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div>
                <x-label id="password_confirmation" :value="__('Confirm Password')" />
                <x-input type="password" id="password_confirmation" name="password_confirmation" />
            </div>
            <x-submit :label="__('Register Account')"/>            
        </form>
    </x-card>
@endsection