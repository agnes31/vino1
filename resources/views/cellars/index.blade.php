@extends('layouts/app')
@section('title', 'Mes celliers')
@section('content')

<section class="background_show">
    <h2>Mes celliers</h2>

    <!-- // Lien pour créer un nouveau cellier -->
    <a href="{{route('cellars.create')}}" class="add-cellar">
        <span class="mdi mdi-plus-box-outline add-cellar-icon"></span>
        Ajouter un cellier
    </a>

    <!-- // Conteneur pour les celliers -->
    <div class="contenue">
        @forelse($cellars as $cellar)
        <a href="{{route('cellars.show', $cellar->id)}}">
            <table class="table table-striped cercle">
                <tbody>
                    <tr>
                        <td>
                            <h3>{{$cellar->name}}</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p>{{$cellar->description}}</p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </a>
        @empty
        <p><span class="mdi mdi-exclamation-thick"></span> Aucun cellier n'a été créé pour le moment.</p>
        @endforelse
    </div>
</section>
@endsection