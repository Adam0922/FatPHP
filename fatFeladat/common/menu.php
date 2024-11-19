<?php
// Determine role based on directory structure or logic
$isAdmin = strpos($_SERVER['SCRIPT_NAME'], '/admin/') !== false;
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <?php if ($isAdmin): ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=munkavall">Munkavállalói adatok</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=munkakor">Munkakör</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=jelenleti">Jelenlétiív</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=munkavall_lista">Munkaváll_Tábla</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=munkakor_lista">Munkakör_Tábla</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=jelenleti_lista">Jelenléti_Tábla</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?p=jelenleti">Jelenlétiív</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
