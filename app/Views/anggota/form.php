<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-account"></i>
        </span> <?= $judul ?> </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="./anggota" class="btn btn-primary">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php if (isset($data)) {
                                echo render_input('nama_anggota', 'Nama', $data->nama_anggota, 'text', '', '', ['required' => true]);
                                echo render_input('gmail_anggota', 'Email', $data->gmail_anggota, 'text', '', '', ['required' => true]);
                                echo render_input('password_anggota', 'Password', '', 'password', '', '', ['placeholder' => 'Kosongkan jika tidak ingin mengubah password']);
                                echo render_select('jk_anggota', $jk, 'Jenis Kelamin', $data->jk_anggota, '', '', ['required' => true]);
                                echo render_select('role_anggota', $role, 'Role', $data->role_anggota, '', '', ['required' => true]);
                                echo render_input('foto_anggota', 'Foto', '', 'file', '', '');
                            } else {

                                echo render_input('nama_anggota', 'Nama', '', 'text', '', '', ['required' => true]);
                                echo render_input('gmail_anggota', 'Email', '', 'text', '', '', ['required' => true]);
                                echo render_input('password_anggota', 'Password', '', 'password', '', '', ['required' => true]);
                                echo render_select('jk_anggota', $jk, 'Jenis Kelamin', '', '', '', ['required' => true]);
                                echo render_select('role_anggota', $role, 'Role', '', '', '', ['required' => true]);
                                echo render_input('foto_anggota', 'Foto', '', 'file', '', '');
                            } ?>
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>