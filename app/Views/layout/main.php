<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIM-SKUM</title>

    <link href="<?= base_url(''); ?>/img/logo-onsdee86.png" rel="icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('sb-admin'); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sb-admin'); ?>/css/sb-admin-2.min.css" rel="stylesheet">




    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?= $this->include('layout/sidebar'); ?>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('layout/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <?= $this->renderSection('content'); ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?= $this->include('layout/footer'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <div id="modal"></div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Apakah akan keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" dibawah jika anda akan mengakhiri session ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <?php if (session()->get('jenis_user') == 'admin' || session()->get('jenis_user') == 'Ketua' || session()->get('jenis_user') == 'Panmud' || session()->get('jenis_user') == 'operator') : ?>
                        <a class="btn btn-primary" href="<?= base_url('auth/logout/admin'); ?>">Logout</a>
                    <?php else :  ?>
                        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Ubah Password Modal-->
    <div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form action="<?= base_url('auth/ubah_password_user'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= csrf_field(); ?>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="password_lama">Password lama</label>
                                    <input type="password" class="form-control" name="password_lama" id="password_lama" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="password_baru">Password Baru</label>
                                    <input type="password" class="form-control" name="password_baru" id="password_baru" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="password_baru2">Konfirmasi password</label>
                                    <input type="password" class="form-control" name="password_baru2" id="password_baru2" aria-describedby="emailHelp">

                                </div>



                            </div>


                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>
                    </div>
                </div>
        </form>
    </div>

    <!-- Ubah Profile  Modal-->
    <!-- <div class="modal fade" id="ubahProfileModal" tabindex="-1" role="dialog" aria-labelledby="ubahProfileModal" aria-hidden="true">
        <form action="<?= base_url('auth/ubah_profile_user'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ubahProfileModal">Ubah Profile</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= csrf_field(); ?>
                        <div class="row">

                            <div class="col">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" name="instansi" id="instansi" aria-describedby="emailHelp">

                                </div>
                                <div class="form-group">
                                    <label for="nomor_hp">Nomor whatsapp</label>
                                    <input type="password" class="form-control" name="nomor_hp" id="nomor_hp" aria-describedby="emailHelp">

                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload Foto</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile01" nama='foto_profil'>
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>

                            </div>

                       </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </div>
                    </div>
                </div>
        </form>
    </div> -->

    <!-- modal -->

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('sb-admin'); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('sb-admin'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <!-- <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script> -->

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('sb-admin'); ?>/js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        <?php if (session()->has('validasi')) : ?>
            <?php $errors = session()->getFlashdata('validasi');
            $msg = "";
            foreach ($errors as $e) {
                $msg .= $e . ', ';
            }
            ?>
            Swal.fire({
                icon: 'error',
                text: '<?= $msg; ?>'

            })
        <?php elseif (session()->has('success')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session()->getFlashdata('success'); ?>'
            })
        <?php elseif (session()->has('email')) : ?>
            Swal.fire({
                icon: 'success',
                text: '<?= session()->getFlashdata('email'); ?>'
            })


        <?php endif; ?>
        let jml_notif_persetujuan_penyitaan = 0;
        let jml_notif_izin_penyitaan = 0;

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('persetujuanpenyitaanadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-persetujuan-penyitaan").show();
                    $(".notif-persetujuan-penyitaan").html(event.data);
                    jml_notif_persetujuan_penyitaan = parseInt(event.data);
                    let jml_notif = jml_notif_izin_penyitaan + jml_notif_persetujuan_penyitaan;

                    $(".total-notif").show();
                    $(".total-notif").html(jml_notif);

                    console.log(event.data);
                    console.log(jml_notif);

                } else {
                    let jml_notif = jml_notif_izin_penyitaan + jml_notif_persetujuan_penyitaan;
                    $(".total-notif").hide();
                    $(".total-notif").html(jml_notif);
                    $(".notif-persetujuan-penyitaan").html('');
                    $(".notif-persetujuan-penyitaan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);
                    console.log(jml_notif);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('izinpenyitaanadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-izin-penyitaan").show();
                    $(".notif-izin-penyitaan").html(event.data);
                    jml_notif_izin_penyitaan = parseInt(event.data);
                    let jml_notif = jml_notif_izin_penyitaan + jml_notif_persetujuan_penyitaan;

                    $(".total-notif").show();
                    $(".total-notif").html(jml_notif);

                    console.log(event.data);
                    console.log(jml_notif);

                } else {
                    let jml_notif = jml_notif_izin_penyitaan + jml_notif_persetujuan_penyitaan;

                    $(".notif-izin-penyitaan").html('');
                    $(".notif-izin-penyitaan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);
                    console.log(jml_notif);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }


        // Notif Penggeledahan

        let jml_notif_persetujuan_penggeledahan = 0;
        let jml_notif_izin_penggeledahan = 0;

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('persetujuanpenggeledahanadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-persetujuan-penggeledahan").show();
                    $(".notif-persetujuan-penggeledahan").html(event.data);
                    jml_notif_persetujuan_penggeledahan = parseInt(event.data);
                    let jml_notif_penggeledahan = jml_notif_izin_penggeledahan + jml_notif_persetujuan_penggeledahan;

                    $(".total-notif-penggeledahan").show();
                    $(".total-notif-penggeledahan").html(jml_notif_penggeledahan);

                    console.log(event.data);
                    console.log(jml_notif_penggeledahan);

                } else {
                    let jml_notif_penggeledahan = jml_notif_izin_penggeledahan + jml_notif_persetujuan_penggeledahan;
                    $(".total-notif-penggeledahan").hide();
                    $(".total-notif-penggeledahan").html(jml_notif_penggeledahan);
                    $(".notif-persetujuan-penggeledahan").html('');
                    $(".notif-persetujuan-penggeledahan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);
                    console.log(jml_notif_penggeledahan);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('izinpenggeledahanadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-izin-penggeledahan").show();
                    $(".notif-izin-penggeledahan").html(event.data);
                    jml_notif_izin_penggeledahan = parseInt(event.data);
                    let jml_notif_penggeledahan = jml_notif_izin_penggeledahan + jml_notif_persetujuan_penggeledahan;

                    $(".total-notif-penggeledahan").show();
                    $(".total-notif-penggeledahan").html(jml_notif_penggeledahan);

                    console.log(event.data);
                    console.log(jml_notif_penggeledahan);

                } else {
                    let jml_notif_penggeledahan = jml_notif_izin_penggeledahan + jml_notif_persetujuan_penggeledahan;

                    $(".notif-izin-penggeledahan").html('');
                    $(".notif-izin-penggeledahan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);
                    console.log(jml_notif_penggeledahan);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }

        // Notif penahanan

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('perpanjanganpenahananadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-penahanan").show();
                    $(".notif-penahanan").html(event.data);

                    console.log(event.data);

                } else {

                    $(".notif-penahanan").html('');
                    $(".notif-penahanan").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }

        // Notif Diversi

        if (typeof(EventSource) !== "undefined") {
            let source = new EventSource("<?= base_url('penetapandiversiadmin/notifikasi'); ?>");
            // source.onopen = function() {
            //     document.getElementById("sse-test").innerHTML = "Start Koneksi";
            // };
            source.onmessage = function(event) {
                if (event.data != 0) {
                    $(".notif-diversi").show();
                    $(".notif-diversi").html(event.data);

                    console.log(event.data);

                } else {

                    $(".notif-diversi").html('');
                    $(".notif-diversi").hide();

                    // document.querySelectorAll(".notif-gugatan").style.hide;

                    console.log(event.data);

                }

            };
        } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support server-sent events...";
        }
    </script>





</body>

</html>