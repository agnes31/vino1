@extends('layouts/app')
@section('title', 'Mise à jour du cellier')
@section('content')

<section class="background_show">
    <!-- Retour -->
    <a href="{{route('cellars.show', $cellar->id)}}" class="myReturn">← Retour</a>

    <h2>Mise à jour du cellier</h2>

    <div class="wineCellar__detail">
        <h2>"{{ ucfirst($cellar->name) }}"</h2>
    </div>

    <!--Modifiant du cellier -->
    <form class="form_cellar" method="post">
        @csrf
        @method('put')
        <div class="input_contain">
            <input type="text" id="name" name="name" value="{{$cellar->name}}" required>
            @if($errors->has('name'))
            <div class="input_error">
                {{$errors->first('name')}}
            </div>
            @endif
        </div>
        <div class="input_contain">
            <textarea name="description" id="description" cols="30" rows="10">{{$cellar->description}}</textarea>
            @if($errors->has('description'))
            <div class="input_error">
                {{$errors->first('description')}}
            </div>
            @endif
        </div>
        <input type="submit" class="submit-button" value="Modifier">
    </form>
</section>
@endsection
