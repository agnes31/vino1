@extends('layouts/auth')
@section('title', 'Page mot de passe oublié')
@section('content')
@csrf

<div class="background-auth">
    <img src="{{ asset('img/logo-site.png') }}" alt="Grappe de raisin-Icône" class="site-logo_auth">
    <form action="{{ route('password.email') }}" method="post" class="form_container">
        @csrf
        <h3>Mot de passe oublié</h3>
        <div>
            <div class="input_contain">
                <input type="email" id="username" name="email" class="" value="{{ old('email')}}" placeholder="{{ __('Courriel') }}">
                <x-input-error :messages="$errors->get('email')" />
            </div>
        </div>
        <x-primary-button class="button log">
            {{ __('Réinitialiser') }}
        </x-primary-button>
        @if (session('status'))
            <div class="status-message">
        {{ session('status') }}
    </div>
    @endif
    </form>
</div>
@endsection
