<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the logo */
        .navbar img {
            height: 40px; /* Set height to match navbar height */
            width: auto; /* Maintain aspect ratio */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Navbar brand/logo -->
        <img src="images/10017656.png" alt="Money stack" class="d-inline-block align-top">

        <!-- Toggle button for mobile view -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar links -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=munkavall">Munkavállalói adatok</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=munkakor">Munkakör</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=jelenleti">Jelenlétiív</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=munkavall_lista">Munkavall_Tábla</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=munkakor_lista">Munkakor_Tábla</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?p=jelenleti_lista">Jelenléti_Tábla</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
