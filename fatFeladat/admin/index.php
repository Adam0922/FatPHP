<?php
require_once('../includes/connect.php');
include('../includes/header.php');
?>
<div class="page-container">
    <?php include('includes/admin_menu.php'); ?>

    <div class="main-content">
        <h1>Admin Vezérlőpult</h1>
    
    <!-- Statisztikai kártyák -->
    <div class="stats-container">
        <div class="stat-card">
            <h3>Munkavállalók száma</h3>
            <?php
            $sql = "SELECT COUNT(*) as count FROM munkavallalo";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <span class="number"><?php echo $row['count']; ?></span>
        </div>
        
        <div class="stat-card">
            <h3>Munkakörök száma</h3>
            <?php
            $sql = "SELECT COUNT(*) as count FROM munkakor";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            ?>
            <span class="number"><?php echo $row['count']; ?></span>
        </div>
    </div>

    <!-- Gyors műveletek -->
    <div class="card">
        <h2>Gyors műveletek</h2>
        <div class="button-container">
            <a href="munkavall_lista.php" class="btn btn-primary">
                <i class="fas fa-users"></i>
                Munkavállalók listája
            </a>
            <a href="munkavall.php" class="btn btn-success">
                <i class="fas fa-user-plus"></i>
                Új munkavállaló
            </a>
            <a href="munkakor_lista.php" class="btn btn-info">
                <i class="fas fa-briefcase"></i>
                Munkakörök listája
            </a>
            <a href="munkakor.php" class="btn btn-warning">
                <i class="fas fa-plus-circle"></i>
                Új munkakör
            </a>
        </div>
    </div>

    <!-- Legutóbbi munkavállalók -->
    <div class="card">
        <h2>Legutóbbi munkavállalók</h2>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Munkakör</th>
                        <th>Munkaviszony kezdete</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Azonosito, Nev, Munkakor, Munkaviszony_kezdete 
                            FROM munkavallalo 
                            ORDER BY Munkaviszony_kezdete DESC 
                            LIMIT 5";
                    $result = $conn->query($sql);
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['Nev'] . "</td>
                                <td>" . $row['Munkakor'] . "</td>
                                <td>" . $row['Munkaviszony_kezdete'] . "</td>
                                <td>
                                    <a href='munkavall_modosit.php?id=" . $row['Azonosito'] . "' class='action-icon edit-icon'>
                                        <i class='fas fa-edit'></i>
                                    </a>
                                    <a href='munkavall_torles.php?id=" . $row['Azonosito'] . "' class='action-icon delete-icon'>
                                        <i class='fas fa-trash'></i>
                                    </a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
$conn->close();
?>