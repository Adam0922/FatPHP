<!DOCTYPE html>
<html lang="hu">
<?php include('../common/header.php'); ?>
<body>
    <?php include('../common/menu.php'); ?>
    <?php
    $p = isset($_GET['p']) ? $_GET['p'] : '';
    include('../common/connect.php');

    if ($p != '') {
        include($p . '.php');
    }
    ?>
</body>
</html>
