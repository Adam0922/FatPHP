<!DOCTYPE html>
<html lang="hu">
<?php include('../common/header.php'); ?>
<body>
    <?php include('../common/menu.php'); ?>
    <?php
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    include('../common/connect.php');

    // Restrict users to view-only modules
    if ($p == 'jelenleti') {
        include($p . '.php');
    } else {
        echo "<p>Hozzáférés megtagadva!</p>";
    }
    ?>
</body>
</html>
