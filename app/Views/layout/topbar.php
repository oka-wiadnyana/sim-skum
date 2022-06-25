<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto top-bar-menu">

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= session()->get('nama_user'); ?></span>
                <img class="img-profile rounded-circle" src="<?= base_url('profil-img/no-profil.jpg'); ?>">
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <?php if (session()->get('jenis_user') == 'Kepolisian' || session()->get('jenis_user') == 'Penuntut Umum' || session()->get('jenis_user') == 'Catatan Sipil' || session()->get('jenis_user') == 'Rutan') : ?>
                    <a class="dropdown-item btn-ubah-profile" href="" data-id="<?= session()->get('id_user'); ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 "></i>
                        Ubah profile
                    </a>
                    <hr>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ubahPasswordModal">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Ubah Password
                    </a>
                    <hr>
                <?php endif; ?>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>

    </ul>

</nav>

<script>
    $('.top-bar-menu').on('click', '.btn-ubah-profile', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        console.log('ok');

        $.ajax({
            type: "post",
            data: {
                id
            },
            url: "<?= base_url('auth/modal_edit_profile'); ?>",
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
            },
            dataType: "json",
        }).then(function(res) {
            $('#modal').html(res);
            $('#modal_edit_profile').modal('show');
            console.log(res)
        });

        console.log(id)
    });
</script>