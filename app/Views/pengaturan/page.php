<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-book"></i>
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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <?= alertBootstrap(['name' => 'error-file', 'flashdata' => true]) ?>
                        <?= alertBootstrap(['name' => 'crud-flashdata', 'flashdata' => true]) ?>
                    </div>
                </div>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2 mt-2">
                            Logo Koperasi
                            <hr>
                            <img src="/uploads/pengaturan/<?= $pengaturan['logo']; ?>" alt="logo perusahaan" width="100%">
                        </div>
                        <div class="col-md-10 mt-2">
                            <?php echo render_input('nama', 'Nama Koperasi', $pengaturan['nama'], 'text', '', '', ['required' => true]); ?>
                            <?php echo render_input('alamat', 'Alamat Koperasi', $pengaturan['alamat'], 'text', '', '', ['required' => true]); ?>
                            <?php echo render_input('logo', 'Logo Koperasi', '', 'file', '', ''); ?>
                            <?php if ($pengaturan['logo'] != null) { ?>
                                <small class="text-muted">
                                    Kosongkan jika anda tidak ingin mengubah logo koperasi
                                </small>
                            <?php } ?>
                            <br><br>
                            <button class="btn btn-primary float-right">
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>