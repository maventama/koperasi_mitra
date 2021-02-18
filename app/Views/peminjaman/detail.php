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
                <button onclick="window.history.go(-1)" class="btn btn-primary">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </button>
                <?php if (has_permission('peminjaman', 'del')) { ?>
                    <button class="btn btn-danger btn-del float-right ml-2" data-id="<?= base64_encode($singledata->id_peminjaman) ?>">
                        <i class="mdi mdi-delete"></i>
                    </button>
                <?php } ?>
                <?php if (has_permission('peminjaman', 'edit')) { ?>
                    <button class="btn btn-warning btn-edit float-right" data-id="<?= base64_encode($singledata->id_peminjaman) ?>">
                        <i class="mdi mdi-tooltip-edit"></i>
                    </button>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="angsuran-tab" data-toggle="tab" href="#angsuran" role="tab" aria-controls="angsuran" aria-selected="false">Angsuran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="riwayat_angsuran-tab" data-toggle="tab" href="#riwayat_angsuran" role="tab" aria-controls="riwayat_angsuran" aria-selected="false">Riwayat Angsuran</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <table class="table table-normal table-bordered">
                                            <tbody>
                                                <?= $table_detail_peminjaman; ?>
                                                <tr>
                                                    <td>
                                                        Status
                                                    </td>
                                                    <td class="status-peminjaman">

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Sudah Dibayarkan</td>
                                                    <td class="sudah-bayar">
                                                        0
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Belum Dibayarkan</td>
                                                    <td class="belum-bayar">
                                                        0
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="angsuran" role="tabpanel" aria-labelledby="angsuran-tab">
                        <div class="row my-2">
                            <div class="col-md-12">
                                <hr>
                                <?php if (has_permission('peminjaman', 'edit')) { ?>
                                    <button class="btn btn-warning btn-multiple float-right">
                                        Edit Multiple Angsuran
                                    </button>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <?= $table_angsuran; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="riwayat_angsuran" role="tabpanel" aria-labelledby="riwayat_angsuran-tab">
                        <div class="table-responsive">
                            <?= $table_riwayat_angsuran; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>