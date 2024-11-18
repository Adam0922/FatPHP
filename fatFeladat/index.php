<!DOCTYPE html>
<html lang="hu">
	<?php
    include('header.php')
    ?>
	<body>
        <?php
    include('menu.php')
    ?>
       
<?php
$p = isset($_GET['p'])?$_GET['p']:'';
include('connect.php');
// echo($p);
if($p != ''){
    include($p .'.php');
}
?>  
	</body>
</html>