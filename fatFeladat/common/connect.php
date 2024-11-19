    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "evvege";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn -> connect_error){
        die("Kapcsolódási hiba:".$conn -> connect_error);
    }
    ?>
