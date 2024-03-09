@extends('layouts/app')
@section('title', 'Liste des Bouteilles')
@section('content')

<section class="background_show">
    <h2>Liste des Bouteilles</h2>

    @foreach($bottles as $bottle)
    <div style="display: flex; margin-bottom: 20px;">
        <div>
            @if($bottle->image)
            <img src="{{ $bottle->image }}" alt="{{ $bottle->nom }}" style="max-width: 100px; height: auto;">
            @else
            Pas d'image
            @endif
        </div>
        <div style="flex-grow: 1; margin-left: 20px;line-height: 1.5;">
            <div style="font-weight: bold; margin-bottom: 10px;">{{ $bottle->name }}</div>
            <div>Pays: {{ $bottle->country }}</div>
            <div>Description: {{ $bottle->description }}</div>
            <div> {{ $bottle->price }} $</div>

            <a href="/bottlesCellar/add/{{ $bottle->id }}">
                <button style=" background-color: #800020; color: white; border-radius: 5px; padding: 10px; border: none; box-shadow: 3px 3px 5px rgba(0,0,0,0.3);">Ajouter cellier</button>
            </a>
        </div>
    </div>
    @endforeach
    {{ $bottles }}
</section>
@endsection