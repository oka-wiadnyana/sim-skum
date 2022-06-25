<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    DAFTAR SKUM BANDING</div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-bordered table-md" id="tabel-skum">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nomor SKUM</th>
                                    <th>Nama</th>
                                    <th>Nomor Telepon</th>
                                    <th>Total Panjar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
<script>
    $(document).ready(function() {

        $('#tabel-skum').DataTable({
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
                url: '<?= base_url('skum/datatable_skum_banding'); ?>', // Change with your own
                method: 'GET', // You are freely to use POST or GET
            }
        })


        $('#tabel-skum').on('click', 'tbody tr td:nth-child(6) .delete_btn', function(e) {
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
                        url: "<?= base_url('skum/delete_banding'); ?>",
                        dataType: "json",
                    }).done(function(res) {
                        $(location).attr('href', '<?= base_url('skum/v_main_skum_banding'); ?>')
                        console.log(res)
                    });
                }
            })
            console.log(id)

        });
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