<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-dns"></i>
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
                <a href="/iuran" class="btn btn-primary">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
                <?php if (has_permission('iuran_wajib', 'del')) { ?>
                    <button class="btn btn-danger btn-del float-right ml-2" data-id="<?= base64_encode($singledata->id_tahun_iuran) ?>">
                        <i class="mdi mdi-delete"></i>
                    </button>
                <?php } ?>
                <?php if (has_permission('iuran_wajib', 'edit')) { ?>
                    <button class="btn btn-warning btn-edit float-right" data-id="<?= base64_encode($singledata->id_tahun_iuran) ?>">
                        <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title"><?= $singledata->tahun_iuran ?></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="table-responsive">
                                    <?= $table_bulan; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>