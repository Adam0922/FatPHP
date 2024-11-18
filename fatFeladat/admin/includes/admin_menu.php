<div class="nav flex-column bg-light p-3" style="width: 250px; min-height: 100vh;">
    <div class="sidebar">
        <h2 class="sidebar-header">Admin Panel</h2>
        <ul class="nav-menu">
            <li>
                <a href="../admin/munkavall_lista.php">
                    <i class="fas fa-users"></i>
                    Munkavállalók kezelése
                </a>
            </li>
            <li>
                <a href="../admin/munkakor_lista.php">
                    <i class="fas fa-briefcase"></i>
                    Munkakörök kezelése
                </a>
            </li>
            <li>
                <a href="../user/index.php">
                    <i class="fas fa-exchange-alt"></i>
                    Váltás felhasználói felületre
                </a>
            </li>
        </ul>
    </div>
</div>

<style>
    .hover-bg-primary:hover {
        background-color: #0d6efd !important;
        color: white !important;
    }

    .nav-link {
        border-radius: 5px;
        padding: 10px 15px;
    }

    .nav-link:hover {
        transition: all 0.3s ease;
    }
</style>