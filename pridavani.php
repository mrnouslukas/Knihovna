<?php

include "map.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ISBN = $_POST["ISBN"] ?? 0;
    $Jmeno = $_POST["Jmeno"] ?? "";
    $Prijmeni = $_POST["Prijmeni"] ?? "";
    $Kniha = $_POST["Kniha"] ?? "";
    $Popis = $_POST["Popis"] ?? "";
    $Img = $_POST["Img"] ?? "";

    $repo = new KnihovnaCela();
    $book = new Kniha($ISBN, $Jmeno, $Prijmeni, $Kniha, $Popis, $Img);
    $repo->createBook($book);
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidej Knihu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            color: #343a40;
        }
        .navbar {
            background-color: #28a745 !important;
        }
        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
        }
        .nav-link {
            color: #ffffff !important;
        }
        .nav-link.active {
            font-weight: bold;
        }
        .form-container {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }
        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Kniha</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Seznam knih</a></li>
                    <li class="nav-item"><a class="nav-link active" href="pridavani.php">Přidej knihu</a></li>
                    <li class="nav-item"><a class="nav-link" href="hledani.php">Vyhledat knihu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">Přidej knihu</h2>
        <form action="pridavani.php" method="post" class="form-container p-4 rounded shadow">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ISBN" class="form-label">ISBN</label>
                    <input class="form-control" type="text" name="ISBN" id="ISBN" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Jmeno" class="form-label">Jméno autora</label>
                    <input class="form-control" type="text" name="Jmeno" id="Jmeno" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Prijmeni" class="form-label">Příjmení autora</label>
                    <input class="form-control" type="text" name="Prijmeni" id="Prijmeni" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Kniha" class="form-label">Název knihy</label>
                    <input class="form-control" type="text" name="Kniha" id="Kniha" required>
                </div>
                <div class="col-12 mb-3">
                    <label for="Popis" class="form-label">Popis</label>
                    <textarea class="form-control" name="Popis" id="Popis" rows="5" placeholder="Vložte popis knihy" required></textarea>
                </div>
                <div class="col-12 mb-3">
                    <label for="Img" class="form-label">Obrázek</label>
                    <input class="form-control" type="text" name="Img" id="Img" required>
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">Uložit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNPopisXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
