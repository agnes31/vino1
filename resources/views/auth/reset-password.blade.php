@extends('layouts/auth')
@section('title', 'Réinitialisation du mot de passe')
@section('content')

@csrf

<div class="background-auth">
    <img src="{{ asset('img/logo-site.png') }}" alt="Grappe de raisin-Icône" class="site-logo_auth">
    <form method="POST" action="{{ route('password.store') }}" class="form_container">
        @csrf
        <h3>Réinitialisation du mot de passe</h3>

        <!-- Password Reset Token -->
        <div class="input_contain">
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
        </div>
        <!-- Email -->
        <div class="input_contain">
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="Courriel" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="input_contain">
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="{{ __('Mot de passe') }}" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="input_contain">
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="{{ __('Confirmation de mot de passe') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <x-primary-button class="button log">
            {{ __('Reset Password') }}
        </x-primary-button>
    </form>
</div>