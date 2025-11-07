<!-- le nom du dossier ou du chemin ici layouts.le nom du fichier ici app -->
@extends('layouts.app')
@section('content')

 {{-- Message de session --}}
    @if(session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

<div class="container"> 
    <a href="/livres/ajouter"> Ajouter un livre</a>
<table class="mt-5 mb-5 table table-success table-striped-columns">
  <thead>
    <tr>
      <th>id</th>
      <th>Titre</th>
      <th>Auteur</th>
      <th>Année</th>
      <th>Edition</th>
      <th>Action</th>
    </tr>
  </thead>
  
  <tbody>

   <!--for each--(livres(nom de la bd) as $parcour $parcour est le nom d'une variable arbitraire  -->
  @foreach($livres as $livre)
  
    <tr>
      <td>{{$livre->id}}</td>
      <td>{{$livre->titre}}</td>
      <td>{{$livre->auteur}}</td>
      <td>{{$livre->date}}</td>
      <td>{{$livre->edition}}</td>

      <td>
                        <a href="{{ route('livres.edit', $livre->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('livres.show', $livre->id) }}" class="btn btn-sm btn-primary">Details</a>


                        <form action="{{ route('livres.destroy', $livre->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Vous etes sur de vouloir supprimer le livre?')">Delete</button>
                        </form>
                    </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>
   
@endsection
    