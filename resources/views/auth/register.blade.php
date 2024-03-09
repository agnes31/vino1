@extends('layouts/auth')
@section('title', 'Page inscription')
@section('content')

<div class="background-auth">
    <img src="{{ asset('img/logo-site.png') }}" alt="Grappe de raisin-Icône" class="site-logo_auth">
    <form method="POST" action="{{ route('register') }}" class="form_container">
        @csrf
        <h3>S'inscrire</h3>
        <!-- Name -->
        <div class="input_contain">
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Nom') }}" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <!-- Email -->
        <div class="input_contain">
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('Courriel') }}" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <!-- Password -->
        <div class="input_contain">
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Mot de passe') }}" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <!-- Confirm Password -->
        <div class="input_contain">
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirmer le mot de passe') }}" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="input_lign">
            <a href="{{ route('login') }}" class="link highlight">
                {{ __('Déjà inscrit?') }}
            </a>
        </div>
        <x-primary-button class="button log">
            {{ __("S'inscrire") }}
        </x-primary-button>
    </form>
</div>
@endsection