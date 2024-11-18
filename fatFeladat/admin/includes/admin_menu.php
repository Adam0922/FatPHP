<div class="sidebar">
    <h2>Admin Panel</h2>
    <nav class="nav-menu">
        <a href="../admin/munkavall_lista.php">
            <i class="fas fa-users"></i>
            <span>Munkavállalók kezelése</span>
        </a>
        <a href="../admin/munkakor_lista.php">
            <i class="fas fa-briefcase"></i>
            <span>Munkakörök kezelése</span>
        </a>
        <a href="../user/index.php">
            <i class="fas fa-exchange-alt"></i>
            <span>Váltás felhasználói felületre</span>
        </a>
    </nav>
</div>

<style>
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #f8f9fa;
    padding: 20px;
    border-right: 1px solid #dee2e6;
}

.sidebar h2 {
    font-size: 24px;
    margin-bottom: 30px;
    color: #333;
    padding-bottom: 15px;
    border-bottom: 1px solid #dee2e6;
}

.nav-menu {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.nav-menu a {
    display: flex;
    align-items: center;
    padding: 12px 15px;
    color: #666;
    text-decoration: none;
    border-radius: 8px;
    transition: all 0.3s ease;
}

.nav-menu a:hover {
    background-color: #e9ecef;
    color: #333;
}

.nav-menu i {
    margin-right: 10px;
    width: 20px;
    text-align: center;
}

.nav-menu span {
    font-size: 14px;
}
</style>