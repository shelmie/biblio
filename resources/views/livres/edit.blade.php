<div class="container py-4">

    {{-- Titre --}}
    <div class="row mb-4">
        <div class="col-sm-12 text-center">
            <h3 class="fw-bold text-primary">
                <i class="fa-solid fa-pen-to-square me-2"></i>Modifier un livre
            </h3>
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

                    {{-- Formulaire de modification --}}
                    <form action="{{ route('livres.update', $livre->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Titre --}}
                        <div class="mb-3 row">
                            <label for="titre" class="col-sm-3 col-form-label fw-semibold">Titre</label>
                            <div class="col-sm-9">
                                <input type="text" name="titre" id="titre"
                                    class="form-control @error('titre') is-invalid @enderror"
                                    value="{{ old('titre', $livre->titre) }}">
                                @error('titre') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Auteur --}}
                        <div class="mb-3 row">
                            <label for="auteur" class="col-sm-3 col-form-label fw-semibold">Auteur</label>
                            <div class="col-sm-9">
                                <input type="text" name="auteur" id="auteur"
                                    class="form-control @error('auteur') is-invalid @enderror"
                                    value="{{ old('auteur', $livre->auteur) }}">
                                @error('auteur') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Edition --}}
                        <div class="mb-3 row">
                            <label for="edition" class="col-sm-3 col-form-label fw-semibold">Édition</label>
                            <div class="col-sm-9">
                                <input type="text" name="edition" id="edition"
                                    class="form-control @error('edition') is-invalid @enderror"
                                    value="{{ old('edition', $livre->edition) }}">
                                @error('edition') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Date --}}
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-3 col-form-label fw-semibold">Date</label>
                            <div class="col-sm-9">
                                <input type="date" name="date" id="date"
                                    class="form-control @error('date') is-invalid @enderror"
                                    value="{{ old('date', $livre->date) }}">
                                @error('date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        {{-- Boutons --}}
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4 me-2">
                                <i class="fa-solid fa-floppy-disk me-1"></i> Mettre à jour
                            </button>
                            <a href="{{ route('aflivre') }}" class="btn btn-outline-secondary px-4">
                                <i class="fa-solid fa-arrow-left me-1"></i> Retour
                            </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>