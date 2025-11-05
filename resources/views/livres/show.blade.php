<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détail du Livre</title>

    <!-- Lien Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome pour les icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
</head>

<body>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <img src="https://www.pumbo.fr/modules/custom/pumbo_price_tool/images/paperback.png"
                        alt="Image du livre" class="book-image">
                    <div class="card-body">
                        <h3 class="card-title mb-3"><i class="fa-solid fa-book me-2"></i>{{ $livre->titre }}</h3>

                        <p><strong>Auteur :</strong> {{ $livre->auteur }}</p>
                        <p><strong>Date de publication :</strong> {{ $livre->date }}</p>
                        <p><strong>Edition :</strong> {{ $livre->edition }}</p>

                        <hr>

                        <p class="card-text">
                            « Le Petit Prince » raconte l’histoire d’un aviateur tombé en panne dans le désert,
                            qui rencontre un petit garçon venu d’une autre planète. Ensemble, ils échangent sur
                            l’amour, l’amitié et la nature humaine à travers des métaphores poétiques et profondes.
                        </p>

                        <div class="mt-4 d-flex justify-content-between align-items-center">
                            <a href="/livres" class="btn-back"><i class="fa-solid fa-arrow-left me-2"></i>Retour à la
                                liste</a>
                            <span class="text-muted"><i class="fa-solid fa-bookmark me-1"></i>ISBN :
                                978-2-070-40068-8</span>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>