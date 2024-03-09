@extends('layouts/auth')
@section('title', 'Page de login')
@section('content')

<div class="background-auth">
    <img src="{{ asset('img/logo-site.png') }}" alt="Grappe de raisin-Icône" class="site-logo_auth">
    <form method="POST" action="{{ route('login') }}" class="form_container">
        @csrf
        <h3>Connection</h3>

        <!-- Email -->
        <div class="input_contain">
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="{{ __('Courriel') }}" />
        </div>

        <!-- Password -->
        <div class="input_contain">
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Mot de passe') }}" />
            <x-input-error :messages="$errors->get('email')" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="input_lign">
            @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}" class="cta-link highlight">
                {{ __("Réinitialiser le mot de passe ?") }}
            </a>
            @endif
        </div>

        <x-primary-button class="button log">
            {{ __('Se connecter') }}
        </x-primary-button>

    </form>
</div>
@endsection