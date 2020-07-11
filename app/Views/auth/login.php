<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Koperasi Mitra SMKN 4 BEKASI</title>
    <!-- plugins:css -->
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
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">
                                <center>
                                    <img src="/uploads/pengaturan/<?= get_data_koperasi()['logo']; ?>" width="100%" class="rounded">
                                </center>
                            </div>
                            <center>
                                <h6 class="font-weight-light">Sign in to continue.</h6>
                            </center>
                            <form class="pt-3" method="post" action="" id="login-form">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-lg" id="gmail_anggota" placeholder="E-mail" name="gmail_anggota">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="password_anggota" placeholder="Password" name="password_anggota">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" type="submit" id="btn-login">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" name="remember"> Keep me signed in </label>
                                    </div>
                                    <!-- <a href="/password_reset" class="auth-link text-black">Forgot password?</a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <!-- endinject -->
    <script>
        // $(document).on('ready', function() {
        $('#login-form').on('submit', function(e) {
            e.preventDefault();
            $('#btn-login').html('Loading ...');
            $.ajax({
                url: 'auth/login',
                type: 'post',
                data: $(this).serialize(),
                success: function(response) {
                    if (response == 'true') {
                        document.location.href = 'dashboard';
                    } else if (response == 'no-gmail') {
                        $('#btn-login').html('SIGN IN');
                        Swal.fire({
                            type: 'error',
                            title: 'Email anda tidak terdaftar di sistem',
                            html: 'Silakan ulangi login anda'
                        });
                    } else {
                        $('#btn-login').html('SIGN IN');
                        console.log(response);
                        Swal.fire({
                            type: 'error',
                            title: 'Password anda salah',
                            html: 'Silakan ulangi login anda'
                        });
                    }
                }
            })
        });
        // })
    </script>
</body>

</html>