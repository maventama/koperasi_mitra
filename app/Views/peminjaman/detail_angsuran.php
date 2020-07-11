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
        <div class="row mb-2">
            <div class="col-md-12">
                <a href="./detail_peminjaman/<?= $id_peminjaman; ?>" class="btn btn-primary">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Detail</h4>
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <table class="table table-normal table-bordered">
                                    <tbody>
                                        <?= $table_detail_angsuran; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>