@extends('layouts/app')
@section('title', 'Détail cellier')
@section('content')

<link href="{{ asset('css/components/modale.css') }}" rel="stylesheet">

<section class="background_show">
    <!-- Retour -->
    <a href="{{route('cellars.index')}}" class="myReturn">← Retour</a>

    <h2>Mon cellier</h2>

    <a href="{{route('bottles.list')}}" class="add-cellar">
        <span class="mdi mdi-plus-box-outline add-cellar-icon"></span>
        Ajouter une bouteille
    </a>
    <!-- Détail cellier -->

    <div class="contenue">
        <div class="table table-striped cercle">
            <div class="wineCellar__detail">
                <h2>{{ ucfirst($cellar->name) }}</h2>
                <p>{{ ucfirst($cellar->description ?? '') }}</p>
            </div>
            <div class="wineCellar__action">
                <a href="{{route('cellars.edit', $cellar->id)}}"><span class="mdi mdi-file-edit" style="font-size: 1.5em;"></span></a>
                <a href="" id="openModal"><span class="mdi mdi-delete-empty" style="font-size: 1.5em;"></span></a>
            </div>
        </div>
    </div>

    <!-- Liste des bouteilles -->
    <div id="bottleContainer">
        @forelse($cellar->getBottlesInWineRoom as $bottle)
        <div class="bottle">
            <div class="bottle-image">
                <img src="{{ $bottle->image }}" alt="{{ $bottle->name }}" style="max-width: 100px; height: auto;">
            </div>
            <div class="bottle-description">
                <h2>{{ $bottle->name }}</h2>
                <p>Pays: {{ $bottle->country }}</p>
                <p>Description: {{ $bottle->description }}</p>
                <p> {{ $bottle->price }} $</p>
            </div>
            <form method="post" action="/bottlesCellar/delete">
                @method('DELETE')
                @csrf
                <input type="hidden" name="bottleId" value="{{$bottle->id}}">
                <input type="hidden" name="cellarId" value="{{$cellar->id}}">
                <button type="submit" class="delete-bottle"><span class="mdi mdi-delete-empty" style="font-size: 1.5em;"></span></button>
            </form>
        </div>
        @empty
        <p>Il n'y a pas de bouteille dans mon cellier.</p>
        @endforelse
    </div>

    <!-- Le modal -->
    <div id="modalOverlay" class="modal-overlay"></div>
    <div id="myModal" class="modal" style="display:none">
        <!-- Contenu du modal -->
        <div class="modal-content">
            <span id="closeModal" class="mdi mdi-close"></span>
            <p>Êtes-vous sûr de vouloir supprimer ?</p>

            <!-- Form -->
            <form method="post">
                @method('DELETE')
                @csrf
                <button type="button" class="grey" id="closeModale">Annuler</button>
                <button type="submit" class="red">Oui, supprimer <span class="mdi mdi-trash-can"></span></button>
            </form>
        </div>
    </div>
</section>
@endsection