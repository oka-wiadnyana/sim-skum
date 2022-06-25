<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    DAFTAR KASIR
                    <?php if (!$data) : ?>
                        <a href="" class="btn btn-primary ml-2 btn-tambah">Tambah Kasir</a>
                    <?php else : ?>
                        <a href="" class="btn btn-warning ml-2 btn-edit">Edit Kasir</a>

                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-bordered table-md" id="tabel-kasir">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>NIP</th>

                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="modal-kasir"></div>
</div>
<script>
    $(document).ready(function() {

        $('#tabel-kasir').DataTable({
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
                url: '<?= base_url('skum/datatable_kasir'); ?>', // Change with your own
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

        $('.btn-tambah').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url: "<?= base_url('skum/modal_kasir'); ?>",

                dataType: "json",
                success: function(response) {
                    $('.modal-kasir').html(response);
                    $('#modal-kasir').modal('show');
                }
            });
        })

        $('.btn-edit').click(function(e) {
            e.preventDefault();
            // console.log('ok');
            $.ajax({
                type: "get",
                url: "<?= base_url('skum/modal_edit_kasir'); ?>",

                dataType: "json",
                success: function(response) {
                    $('.modal-kasir').html(response);
                    $('#modal-edit-kasir').modal('show');
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