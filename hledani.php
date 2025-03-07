<?php
include "map.php";

$repo = new KnihovnaCela();
$knihy = [];
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && !empty($_GET)) {
    if (!empty($_GET['ISBN']) || !empty($_GET['Jmeno']) || !empty($_GET['Prijmeni']) || !empty($_GET['Kniha'])) {
        $knihy = $repo->filterBooks(
            $_GET['ISBN'] ?? null, 
            $_GET['Jmeno'] ?? null, 
            $_GET['Prijmeni'] ?? null, 
            $_GET['Kniha'] ?? null
        );
        if (empty($knihy)) {
            $error = 'Nic nebylo nalezeno.';
        }
    } else {
        $error = 'Zadejte prosím alespoň jedno kritérium.';
    }
}
?>

<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vyhledávání knih</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Seznam knih</a></li>
                    <li class="nav-item"><a class="nav-link" href="pridavani.php">Přidej knihu</a></li>
                    <li class="nav-item"><a class="nav-link active" href="hledani.php">Vyhledat knihu</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <h2 class="mb-4">Vyhledávání knih</h2>
        <form action="hledani.php" method="get" class="form-container p-4 rounded shadow">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ISBN" class="form-label">ISBN</label>
                    <input class="form-control" type="text" name="ISBN" id="ISBN">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Jmeno" class="form-label">Jméno autora</label>
                    <input class="form-control" type="text" name="Jmeno" id="Jmeno">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Prijmeni" class="form-label">Příjmení autora</label>
                    <input class="form-control" type="text" name="Prijmeni" id="Prijmeni">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="Kniha" class="form-label">Název knihy</label>
                    <input class="form-control" type="text" name="Kniha" id="Kniha">
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-primary btn-lg">Vyhledat</button>
            </div>
        </form>

        <?php if (!empty($error)): ?>
            <p class="text-danger mt-3"><?= $error ?></p>
        <?php endif; ?>

        <?php if (!empty($knihy)): ?>
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped">
                    <thead class="table-success">
                        <tr>
                            <th>ISBN</th>
                            <th>Jméno autora</th>
                            <th>Příjmení autora</th>
                            <th>Název knihy</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($knihy as $book): ?>
                            <tr>
                                <td><?= htmlspecialchars($book['ISBN']) ?></td>
                                <td><?= htmlspecialchars($book['Jmeno']) ?></td>
                                <td><?= htmlspecialchars($book['Prijmeni']) ?></td>
                                <td><?= htmlspecialchars($book['Kniha']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

