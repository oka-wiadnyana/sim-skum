<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Panjar Perkara : <?= $data['nomor_skum']; ?>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <div class="col-8">Biaya ATK</div>
                        <div class="col-1">:</div>
                        <div class="col-3 atk"><?= $data['atk']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Biaya Pendaftaran</div>
                        <div class="col-1">:</div>
                        <div class="col-3 pendaftaran" id=""><?= $data['pendaftaran']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Panggilan Penguggat</div>
                        <div class="col-1">:</div>
                        <div class="col-3 panggilan-penggugat" id=''><?= $data['panggilan_penggugat']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Panggilan Tergugat</div>
                        <div class="col-1">:</div>
                        <div class="col-3 panggilan-tergugat" id=''><?= $data['panggilan_tergugat']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Pemberitahuan Putusan Penguggat</div>
                        <div class="col-1">:</div>
                        <div class="col-3 putusan-penggugat" id=''><?= $data['pemb_putusan_penggugat']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Pemberitahuan Putusan Tergugat</div>
                        <div class="col-1">:</div>
                        <div class="col-3 putusan-tergugat" id=''><?= $data['pemb_putusan_tergugat']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">PNBP Panggilan Pertama</div>
                        <div class="col-1">:</div>
                        <div class="col-3 pnbp-panggilan" id=''><?= $data['pnbp_panggilan_pertama']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">PNBP Pemberitahuan Putusan</div>
                        <div class="col-1">:</div>
                        <div class="col-3 pnbp-putusan" id=''><?= $data['pnbp_pemberitahuan_putusan']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Biaya Sumpah</div>
                        <div class="col-1">:</div>
                        <div class="col-3 sumpah" id=''><?= $data['sumpah']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Materai</div>
                        <div class="col-1">:</div>
                        <div class="col-3 materai" id=''><?= $data['materai']; ?></div>
                    </div>
                    <div class="d-flex">
                        <div class="col-8">Redaksi</div>
                        <div class="col-1">:</div>
                        <div class="col-3 redaksi" id=''><?= $data['redaksi']; ?></div>
                    </div>
                    <hr>
                    <div class="d-flex">
                        <div class="col-8">Jumlah</div>
                        <div class="col-1">:</div>
                        <div class="col-3" id='jumlah-non-ecourt'><?= $data['jumlah']; ?></div>
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
            ajax: {
                url: '<?= base_url('skum/datatable_skum'); ?>', // Change with your own
                method: 'GET', // You are freely to use POST or GET
            }
        })

        $('#tabel-alat-bantu').on('click', 'tbody tr td:nth-child(3) .delete_btn', function(e) {
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
                        url: "<?= base_url('alatbantu/delete'); ?>",
                        dataType: "json",
                    }).done(function(res) {
                        $(location).attr('href', '<?= base_url('alatbantu'); ?>')
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