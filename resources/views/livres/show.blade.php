<!-- le nom du dossier ou du chemin ici layouts.le nom du fichier ici app -->
@extends('layouts.app')
@section('content')

    <style>
        body {
            background-color: #f5f7fa;
        }

        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.02);
        }

        .book-image {
            height: 350px;
            object-fit: cover;
            border-bottom: 4px solid #0d6efd;
        }

        .card-title {
            font-weight: bold;
            color: #0d6efd;
        }

        .card-text {
            text-align: justify;
        }

        .btn-back {
            background-color: #0d6efd;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .btn-back:hover {
            background-color: #084298;
        }
    </style>




    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <!-- "php artisan storage:link" est la commande à taper dans gitbash pour faire creer les repertoires des images à stocker, le code <img src="{{asset ('storage/'. $livre->image)}}"
 est le lien qui appelle l'image sur la vue show-->
                    <img src="{{asset ('storage/'. $livre->image)}}"

                        alt="Image du livre" class="book-image">
                    <div class="card-body">
                        <h3 class="card-title mb-3"><i class="fa-solid fa-book me-2"></i>{{ $livre->titre }}</h3>

                        <p><strong>Auteur :</strong> {{ $livre->auteur }}</p>
                        <p><strong>Date de publication :</strong> {{ $livre->date }}</p>
                        <p><strong>Edition :</strong> {{ $livre->edition }}</p>

                        <a href="{{asset ('storage/'. $livre->document)}}" target="_blank"> LIRE DOCUMENT</a>

                        <hr>
                        {{--inserer--}}
                        <p class="card-text">
                        <h5>Description</h5>
                        {{ $livre->description ?? 'Aucune description fournie.' }}
                        </p>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <a href="/" class="btn-back"><i class="fa-solid fa-arrow-left me-2"></i>Retour à la
                                liste</a>
                            <span class="text-muted"><i class="fa-solid fa-bookmark me-1"></i>ISBN :
                                {{ $livre->isbn ?? 'Non renseigné' }}</span>
                        </div>





                    </div>

                </div>

            </div>
        </div>
    </div>

    @endsection