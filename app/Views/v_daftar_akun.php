<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    DAFTAR AKUN
                    <a href="" class="btn btn-primary ml-2 btn-akun">Tambah Akun</a>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-bordered table-md" id="tabel-akun">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>

                                    <th>Aksi</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="modal-akun"></div>
</div>
<script>
    $(document).ready(function() {

        $('#tabel-akun').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            "columnDefs": [{
                    "target": 0,
                    "orderable": true,
                },
                {
                    responsivePriority: 1,
                    targets: 0,

                },
                {
                    responsivePriority: 1,
                    targets: -1,

                }
            ],
            ajax: {
                url: '<?= base_url('auth/datatable_akun'); ?>', // Change with your own
                method: 'GET', // You are freely to use POST or GET
            }
        })


        $('#tabel-akun').on('click', 'tbody tr td:nth-child(4) .delete_btn', function(e) {
            e.preventDefault();
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            Swal.fire({
                title: `Anda Yakin menghapus ${nama}?`,
                text: "Anda tidak dapat mengulanginya lagi",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "post",
                        data: {
                            id

                        },
                        url: "<?= base_url('skum/delete'); ?>",
                        dataType: "json",
                    }).done(function(res) {
                        $(location).attr('href', '<?= base_url('skum/v_main_skum'); ?>')
                        console.log(res)
                    });
                }
            })
            console.log(id)

        });

        $('.btn-akun').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "<?= base_url('auth/modal_akun'); ?>",

                dataType: "json",
                success: function(response) {
                    $('.modal-akun').html(response);
                    $('#modal-akun').modal('show');
                }
            });
        })
    })
</script>
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
</script>
<?= $this->endSection(); ?>