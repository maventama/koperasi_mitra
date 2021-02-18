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
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <?php if (has_permission('anggota', 'add')) { ?>
                            <a href="/anggota/form" class="btn btn-primary">
                                Tambah
                            </a>
                        <?php } ?>
                        <!-- <button class="btn btn-primary" onclick="modal_form('/anggota/handle_form_anggota', '', 'Form Anggota', '/anggota/form_anggota')">
                            Tambah
                        </button> -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?= alertBootstrap(['name' => 'error-file', 'flashdata' => true]) ?>
                        <?= alertBootstrap(['name' => 'crud-flashdata', 'flashdata' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <?= $table_anggota; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>