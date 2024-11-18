<!DOCTYPE html>
<html lang="hu">
    <?php
    require_once('includes/connect.php');
    ?>
    <body>
        <?php
        include('includes/menu.php');
        ?>

        <?php
        $p = isset($_GET['p']) ? $_GET['p'] : '';

        // Ellenőrizzük, hogy melyik szekcióban vagyunk
        if(strpos($p, 'munkavall') !== false || strpos($p, 'munkakor') !== false) {
            // Admin fájlok
            include('admin/' . $p . '.php');
        } elseif(strpos($p, 'jelenleti') !== false) {
            // User fájlok
            include('user/' . $p . '.php');
        }
        ?>
    </body>
</html>