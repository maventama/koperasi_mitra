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
                <button class="btn btn-danger float-right ml-2 btn-del" data-id="<?= base64_encode($singledata->id_anggota) ?>">
                    <i class="mdi mdi-delete"></i>
                </button>
                <a href="/form_anggota/<?= base64_encode($singledata->id_anggota) ?>" class="btn btn-warning float-right">
                    <i class="mdi mdi-tooltip-edit"></i>
                </a>
            </div>
        </div>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="iuran_wajib-tab" data-toggle="tab" href="#iuran_wajib" role="tab" aria-controls="iuran_wajib" aria-selected="false">Riwayat Iuran Wajib</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="peminjaman-tab" data-toggle="tab" href="#peminjaman" role="tab" aria-controls="peminjaman" aria-selected="false">Peminjaman</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title"><?= $singledata->nama_anggota ?></h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4 mt-2">
                                                <?php if ($singledata->foto_anggota) { ?>
                                                    <img src="./uploads/anggota/<?= $singledata->foto_anggota ?>" alt="" style="width: 100%;" class="shadow-lg">
                                                <?php } else { ?>
                                                    <img src="./assets/user.png" alt="" style="width: 100%;" class="shadow-lg">
                                                <?php } ?>
                                            </div>
                                            <div class="col-md-8 mt-2">
                                                <table class="table table-normal table-bordered">
                                                    <tbody>
                                                        <?= $table_detail ?>
                                                        <tr>
                                                            <td>
                                                                Ditambahkan pada
                                                            </td>
                                                            <td>
                                                                <?= tgl_indo_second($singledata->ts_add_anggota) ?>
                                                            </td>
                                                        </tr>
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
            </div>
            <div class="tab-pane fade" id="iuran_wajib" role="tabpanel" aria-labelledby="iuran_wajib-tab">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="table-responsive">
                            <?= $table_iuran_wajib; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="peminjaman" role="tabpanel" aria-labelledby="peminjaman-tab">
                <div class="row">
                    <div class="col-md-12">
                        <hr>
                        <div class="table-responsive">
                            <?= $table_peminjaman; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>