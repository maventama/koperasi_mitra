<div class="page-header">
    <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white mr-2">
            <i class="mdi mdi-home"></i>
        </span> <?= $judul; ?> </h3>
    <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
                <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
    </nav>
</div>
<?php if (get_data_user()->role_anggota == 3) { ?>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>
                        Hai, <?= get_data_user()->nama_anggota; ?>
                    </h3>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <a href="/iuran_wajibku" class="btn btn-block btn-gradient-primary">
                                Iuran Wajibku <i class="mdi mdi-dns menu-icon"></i>
                            </a>
                        </div>
                        <div class="col-md-6 mt-3">
                            <a href="/peminjaman" class="btn btn-block btn-gradient-primary">
                                Peminjamanku <i class="mdi mdi-book menu-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if (get_data_user()->role_anggota == 2 || is_admin(get_data_user()->id_anggota)) { ?>
    <div class="row">
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Iuran Wajib <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h4 class="mb-5 card-iuran-wajib"></h4>
                    <h6 class="card-text">Bulan ini</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Peminjaman <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h4 class="mb-5 peminjaman-berlangsung"></h4>
                    <h6 class="card-text">Peminjaman yang Sedang Berlangsung</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title">Grafik Total Angsuran Perbulan</h4>
                    <canvas id="lineChart" style="height: 230px; display: block; width: 461px;" width="461" height="230" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <h4 class="card-title">Doughnut chart</h4>
                    <canvas id="doughnutChart" style="height: 230px; display: block; width: 461px;" width="461" height="230" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>
<?php } ?>