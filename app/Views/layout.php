<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= base_url() ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Koperasi mitra</title>
    <!-- plugins:css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="assets/data_tabel/css_datatabel/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/data_tabel/css_datatabel/buttons.bootstrap4.css">
    <link rel="stylesheet" href="assets/vendors/select2/select2.min.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <?php if (!get_data_user()->foto_anggota) { ?>
                                    <img src="/assets/user.png" alt="image">
                                <?php } else { ?>
                                    <img src="/uploads/anggota/<?= get_data_user()->foto_anggota ?>" alt="image">
                                <?php } ?>
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black"><?= get_data_user()->nama_anggota; ?></p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/logout">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block full-screen-link">
                        <a class="nav-link">
                            <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                            <i class="mdi mdi-bell-outline"></i>
                            <?php

                            use App\Models\Dja_model;

                            $dja_model = new Dja_model();
                            $notifikasi = $dja_model->get_where_result('notifikasi', ['user_notifikasi' => get_user_id(), 'baca_notifikasi' => 0], '', '', 3);
                            $notifikasiAll = $dja_model->get_where_result('notifikasi', ['user_notifikasi' => 'all', 'baca_notifikasi' => 0], '', '', 3); ?>
                            <?php if (count($notifikasi) > 0 || count($notifikasiAll) > 0) { ?>
                                <span class="count-symbol bg-danger"></span>
                            <?php } ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <h6 class="p-3 mb-0">Notifications</h6>
                            <?php
                            if ($notifikasi) {
                                foreach ($notifikasi as $nk => $nv) {
                            ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="mdi mdi-information-variant"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="preview-subject font-weight-normal mb-1">Informasi Untuk Anda</h6>
                                            <p class="text-gray ellipsis mb-0">
                                                <?= $nv->pesan_notifikasi; ?>
                                            </p>
                                        </div>
                                    </a>
                                <?php }
                            } else {
                                foreach ($notifikasiAll as $nak => $nav) { ?>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item preview-item">
                                        <div class="preview-thumbnail">
                                            <div class="preview-icon bg-success">
                                                <i class="mdi mdi-information-variant"></i>
                                            </div>
                                        </div>
                                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="preview-subject font-weight-normal mb-1">Informasi Untuk Semua</h6>
                                            <p class="text-gray ellipsis mb-0">
                                                <?= $nv->pesan_notifikasi; ?>
                                            </p>
                                        </div>
                                    </a>
                            <?php }
                            } ?>
                            <div class="dropdown-divider"></div>
                            <h6 class="p-3 mb-0 text-center">
                                <a href="/notifikasi">
                                    See all notifications
                                </a>
                            </h6>
                        </div>
                    </li>
                    <li class="nav-item nav-logout d-none d-lg-block">
                        <a class="nav-link" href="/logout">
                            <i class="mdi mdi-power"></i>
                        </a>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image">
                                <?php if (!get_data_user()->foto_anggota) { ?>
                                    <img src="/assets/user.png" alt="profile">
                                <?php } else { ?>
                                    <img src="/uploads/anggota/<?= get_data_user()->foto_anggota ?>" alt="profile">
                                <?php } ?>
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <span class="font-weight-bold mb-2"><?= get_data_user()->nama_anggota; ?></span>
                                <span class="text-secondary text-small"><?= $profile_role[get_data_user()->role_anggota]; ?></span>
                            </div>
                            <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <?= view('menu') ?>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <?= view($page) ?>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2017 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="mainModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="modal_form" enctype="multipart/form-data">
                    <div class="modal-body main-modal-body">

                    </div>
                    <div class="modal-footer main-modal-footer">

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- <script src="assets/js/dashboard.js"></script> -->
    <script src="assets/js/todolist.js"></script>
    <!-- End custom js for this page -->
    <!-- data tables -->
    <script src="assets/data_tabel/js_datatabel/jquery.dataTables.min.js"></script>
    <script src="assets/data_tabel/js_datatabel/dataTables.bootstrap4.min.js"></script>
    <script src="assets/data_tabel/js_datatabel/dataTables.buttons.min.js"></script>
    <script src="assets/data_tabel/js_datatabel/buttons.bootstrap4.min.js"></script>
    <script src="assets/plugins/jszip/jszip.js"></script>

    <script src="assets/plugins/datatables-buttons/js/buttons.flash.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.html5.js"></script>
    <script src="assets/plugins/datatables-buttons/js/buttons.print.js"></script>
    <script src="assets/data_tabel/js_datatabel/pdfmake.min.js"></script>
    <script src="assets/data_tabel/js_datatabel/vfs_fonts.js"></script>
    <script src="assets/vendors/select2/select2.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script>
        function modal_form(link, idrow, title, link_render) {
            $.ajax({
                url: 'koperasi' + link_render + '/' + idrow,
                type: 'post',
                success: function(data) {
                    $('h5.modal-title').html(title);
                    $('form#modal_form').attr({
                        action: 'koperasi' + link + '/' + idrow
                    });
                    var allInput = '';
                    for (let i = 0; i < data.length; i++) {
                        allInput = allInput + data[i];
                    }
                    $('.main-modal-body').html(allInput);
                    $('.main-modal-footer').html('<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><button class="btn btn-primary btn-main-modal" type="submit">Save changes</button>');
                    $('#mainModal').modal('show');
                }
            });
        }
        $('.btn-del').on('click', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            Swal.fire({
                type: 'question',
                title: 'Apakah anda yakin ingin menghapusnya ?',
                showCancelButton: true,
            }).then(function(result) {
                if (result.value) {
                    document.location.href = '../koperasi/anggota/delete/' + id;
                }
            })
        });
        var $_GET = {};
        if (document.location.toString().indexOf('?') !== -1) {
            var query = document.location
                .toString()
                // get the query string
                .replace(/^.*?\?/, '')
                // and remove any existing hash string (thanks, @vrijdenker)
                .replace(/#.*$/, '')
                .split('&');

            for (var i = 0, l = query.length; i < l; i++) {
                var aux = decodeURIComponent(query[i]).split('=');
                $_GET[aux[0]] = aux[1];
            }
        }
        //get the 'index' query parameter
        if ($_GET['del'] == 'success') {
            Swal.fire({
                type: 'success',
                title: 'Berhasil dihapus',
                html: 'Data berhasil dihapus'
            });
        }
        if ($_GET['add'] == 'success') {
            Swal.fire({
                type: 'success',
                title: 'Berhasil ditambahkan',
                html: 'Data berhasil ditambahkan'
            });
        }
        if ($_GET['not'] != '') {
            $.ajax({
                url: "<?= base_url('notifikasi/single_notif'); ?>",
                type: 'post',
                data: {
                    id_notifikasi: $_GET['not']
                },
                success: function(result) {
                    if (result != '') {
                        Swal.fire({
                            type: 'info',
                            title: 'Notifikasi',
                            html: result
                        });
                    }
                },
            })
        }
    </script>
    <?php if (isset($js)) {
        echo view($js);
    }  ?>
</body>

</html>