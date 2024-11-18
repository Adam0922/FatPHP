<div class="nav flex-column bg-light p-3" style="width: 250px; min-height: 100vh;">
    <div class="mb-4">
        <h4 class="text-dark">Admin Panel</h4>
    </div>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item mb-2">
            <a href="../admin/munkavall_lista.php" class="nav-link text-dark hover-bg-primary">
                <i class="fas fa-users me-2"></i>
                Munkavállalók kezelése
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="../admin/munkakor_lista.php" class="nav-link text-dark hover-bg-primary">
                <i class="fas fa-briefcase me-2"></i>
                Munkakörök kezelése
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="../user/index.php" class="nav-link text-dark hover-bg-primary">
                <i class="fas fa-exchange-alt me-2"></i>
                Váltás felhasználói felületre
            </a>
        </li>
    </ul>
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