<?php
include "map.php";

$repo = new KnihovnaCela();
$book = $repo->getAllBooks();
?>
<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Seznam Knih</title>
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
        .table thead {
            background-color: #c3e6cb;
        }
        .table tbody tr:hover {
            background-color: #d4edda;
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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Seznam knih</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pridavani.php">Přidat Knihu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hledani.php">Vyhledat Knihu</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="mb-4">Seznam knih</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-success">
                    <tr>
                        <th>ISBN</th>
                        <th>Jméno Autora</th>
                        <th>Příjmení Autora</th>
                        <th>Název Knihy</th>
                        <th>Popis</th>
                        <th>Obrázek obalu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($book as $book) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($book->ISBN); ?></td>
                            <td><?php echo htmlspecialchars($book->Jmeno); ?></td>
                            <td><?php echo htmlspecialchars($book->Prijmeni); ?></td>
                            <td><?php echo htmlspecialchars($book->Kniha); ?></td>
                            <td><?php echo htmlspecialchars($book->Popis); ?></td>
                            <td><img src="<?php echo htmlspecialchars($book->Img); ?>" alt="Obrázek obalu" style="max-width: 100px; max-height: 100px;"></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
