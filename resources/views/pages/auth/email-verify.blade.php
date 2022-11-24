@extends('layouts.authentication')

@section('content')
    <x-card width="2xl">
        <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
            <p class="text-sm">{{ __('Thank you for registering. We send the verification link to your email to continue to the registration. Just click the link we send you to verify your account.') }}</p>
            <x-submit :label="__('Resend Email Verification')" />
        </form>
    </x-card>
@endsection