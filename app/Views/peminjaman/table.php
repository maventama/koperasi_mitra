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
                <?php if (has_permission('peminjaman', 'add')) { ?>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="btn btn-primary" id="btn-add" style="cursor: pointer;">
                                Tambah
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12">
                        <?= alertBootstrap(['name' => 'error-file', 'flashdata' => true]) ?>
                        <?= alertBootstrap(['name' => 'crud-flashdata', 'flashdata' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?= $table_peminjaman; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>