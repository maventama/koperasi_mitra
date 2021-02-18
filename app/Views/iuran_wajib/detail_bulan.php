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
                <a href="/iuran/<?= base64_encode($tahun_iuran->id_tahun_iuran); ?>" class="btn btn-primary">
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
                                <h4 class="card-title"><?= bulan_iuran($singledata->bulan_iuran) . ' ' . $tahun_iuran->tahun_iuran ?></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <table class="table table-normal table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>
                                                Bulan
                                            </td>
                                            <td>
                                                <?= bulan_iuran($singledata->bulan_iuran); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Jumlah Anggota Sudah Bayar
                                            </td>
                                            <td class="jumlah-anggota-bayar">
                                                <?php
                                                if ($singledata->total_bulan_iuran != NULL) {
                                                    echo 'Belum ada';
                                                } else {
                                                    d(count(get_anggota_iuran_wajib($singledata->id_bulan_iuran)));
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Total Bulan Ini
                                            </td>
                                            <td class="jumlah-total-bulan">
                                                <?= nominal_rupiah($singledata->total_bulan_iuran) ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <!-- <center> -->
                                <h4>Data Anggota Belum Bayar</h4>
                                <!-- </center> -->
                                <hr>
                                <?= $table_anggota_iuran_wajib; ?>
                            </div>
                            <div class="col-md-6">
                                <!-- <center> -->
                                <h4>Data Anggota Belum Bayar</h4>
                                <!-- </center> -->
                                <hr>
                                <?= $table_anggota_iuran_wajib2; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>