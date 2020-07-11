<?php if (has_permission('dashboard', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'dashboard') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="dashboard">
            <span class="menu-title">Dashboard</span>
            <i class="mdi mdi-home menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('me', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'me') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="me">
            <span class="menu-title">Akun Saya</span>
            <i class="mdi mdi-account-circle menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('anggota', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'anggota') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="anggota">
            <span class="menu-title">Anggota</span>
            <i class="mdi mdi-account menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('iuran_wajib', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'iuran_wajib') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="<?php if (get_data_user()->role_anggota == 3) {
                                        echo 'iuran_wajibku';
                                    } ?><?php if (get_data_user()->role_anggota == 2) {
                                            echo 'iuran_wajib';
                                        } ?>">
            <span class="menu-title">Iuran Wajib</span>
            <i class="mdi mdi-dns menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('peminjaman', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'peminjaman') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="peminjaman">
            <span class="menu-title">Peminjaman</span>
            <i class="mdi mdi-book-multiple menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('role', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'role') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="role">
            <span class="menu-title">Role</span>
            <i class="mdi mdi-key menu-icon"></i>
        </a>
    </li>
<?php } ?>
<?php if (has_permission('pengaturan', 'view')) { ?>
    <li class="nav-item <?php if ($menu == 'pengaturan') {
                            echo 'active';
                        } ?>">
        <a class="nav-link" href="pengaturan">
            <span class="menu-title">Pengaturan</span>
            <i class="mdi mdi-settings menu-icon"></i>
        </a>
    </li>
<?php } ?>

<li class="nav-item">
    <a class="nav-link" href="logout">
        <span class="menu-title">Logout</span>
        <i class="mdi mdi-power menu-icon"></i>
    </a>
</li>