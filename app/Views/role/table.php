<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-key"></i>
        </span> <?= $judul; ?> </h3>
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
        <div class="card card-body">
            <div class="row">
                <div class="col-md-12">
                    <?= alertBootstrap(['name' => 'crud-flashdata', 'flashdata' => 'true']); ?>
                </div>
            </div>
            <?php if (has_permission('role', 'add')) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <a href="/role/form" class="btn btn-primary">
                            Tambah
                        </a>
                    </div>
                </div>
            <?php } ?>
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <?= $table_role; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>