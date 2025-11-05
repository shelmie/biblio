
<div class="container py-4">

    {{-- Titre --}}
    <div class="row mb-4">
        <div class="col-sm-12 text-center">
            <h3 class="fw-bold text-primary"><i class="fa-solid fa-briefcase me-2"></i>Formulaire de bibliotheque</h3>
            <hr class="w-25 mx-auto border-success opacity-75">
        </div>
    </div>

    {{-- Message de session --}}
    @if(session('message'))
        <div class="alert alert-{{ session('status') }} alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm border-0">
                <div class="card-body p-4" style="background-color: #f8f9fa; border-radius: .5rem;">

                    {{-- Affichage des erreurs globales --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('livres.store') }}" method="POST">
                        @csrf

                        {{-- Titre --}}
                        <div class="mb-3 row">
                            <label for="titre" class="col-sm-3 col-form-label fw-semibold">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" name="titre" id="titre" class="form-control @error('titre') is-invalid @enderror" 
                                       placeholder="titre du livre" value="{{ old('titre') }}">
                                @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                         {{-- Auteur --}}
                        <div class="mb-3 row">
                            <label for="auteur" class="col-sm-3 col-form-label fw-semibold">Auteur</label>
                            <div class="col-sm-9">
                                <input type="text" name="auteur" id="auteur" class="form-control @error('auteur') is-invalid @enderror" 
                                       placeholder="L'auteur du livre" value="{{ old('auteur') }}">
                                @error('auteur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

    

                          {{-- Edition --}}
                        <div class="mb-3 row">
                            <label for="edition" class="col-sm-3 col-form-label fw-semibold">Edition</label>
                            <div class="col-sm-9">
                                <input type="text" name="edition" id="edition" class="form-control @error('edition') is-invalid @enderror" 
                                       placeholder="L'edition du livre" value="{{ old('edition') }}">
                                @error('edition') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>


                                             {{-- Annee --}}
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-3 col-form-label fw-semibold">Année</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date" class="form-control @error('Date') is-invalid @enderror" 
                                       placeholder="L'annee du livre" value="{{ old('date') }}">
                                @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Boutons --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-success px-4 me-2">
                                <i class="fa-solid fa-plus me-1"></i> Ajouter
                            </button>
                            <a href="#" class="btn btn-outline-danger px-4">
                                <i class="fa-solid fa-xmark me-1"></i> Annuler
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
