@extends('layouts/app')
@section('title', 'Mes celliers')
@section('content')

<section>
    <h2>Ajouter la bouteille</h2>

    @foreach($bottles as $bottle)
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
    </div>
    @endforeach


    <form method="post">
        @csrf
        <input type="hidden" name="bottleId" value="{{$bottleId}}">
        <input type="number" name="quantity" value="{{old('quantité')}}" required placeholder="{{ __('Quantité') }}">

        <h2>Choisir le cellier</h2>

        <select name="cellarId">
            @forelse($cellars as $cellar)
            <option value="{{$cellar->id}}">{{$cellar->name}}</option>
            @empty
            <p> <span class="mdi mdi-exclamation-thick"></span> Aucun cellier n'a été créé pour le moment.</p>
            @endforelse
        </select>

        <input type="submit" class="submit-button" value="Ajouter">
    </form>

</section>
@endsection
