<?php
require_once('../includes/connect.php');
include('../includes/header.php');
include('includes/admin_menu.php');
?>

<div class="main-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mt-4">
            <h1 class="display-4 mb-4">Admin Vezérlőpult</h1>

            <!-- Statisztikai kártyák -->
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Munkavállalók száma</h5>
                            <?php
                            $sql = "SELECT COUNT(*) as count FROM munkavallalo";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <h2 class="display-4"><?php echo $row['count']; ?></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Munkakörök száma</h5>
                            <?php
                            $sql = "SELECT COUNT(*) as count FROM munkakor";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            ?>
                            <h2 class="display-4"><?php echo $row['count']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Gyors műveletek -->
            <div class="card mb-4">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Gyors műveletek</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <a href="munkavall_lista.php" class="btn btn-primary btn-lg btn-block">
                                <i class="fas fa-users mr-2"></i>
                                Munkavállalók listája
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="munkavall.php" class="btn btn-success btn-lg btn-block">
                                <i class="fas fa-user-plus mr-2"></i>
                                Új munkavállaló
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="munkakor_lista.php" class="btn btn-info btn-lg btn-block">
                                <i class="fas fa-briefcase mr-2"></i>
                                Munkakörök listája
                            </a>
                        </div>
                        <div class="col-md-3 mb-3">
                            <a href="munkakor.php" class="btn btn-warning btn-lg btn-block">
                                <i class="fas fa-plus-circle mr-2"></i>
                                Új munkakör
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Legutóbbi munkavállalók táblázat -->
            <div class="card">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Legutóbbi munkavállalók</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead-dark">
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
                                                <a href='munkavall_modosit.php?id=" . $row['Azonosito'] . "' class='btn btn-warning btn-sm'>
                                                    <i class='fas fa-edit'></i>
                                                </a>
                                                <a href='munkavall_torles.php?id=" . $row['Azonosito'] . "' class='btn btn-danger btn-sm'>
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
        </div>
    </div>
</div>
</div>

<?php
$conn->close();
?>