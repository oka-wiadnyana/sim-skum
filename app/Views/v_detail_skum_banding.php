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
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="col-8">Pendaftaran</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pendaftaran"><?= $data['pendaftaran']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Penyerahan Akta Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 penyerahan-akta" id=""><?= $data['pnbp_penyerahan_akta']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Pernyataan Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pemberitahuan-banding" id=''><?= $data['pemberitahuan_banding']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Relas Pemberitahuan Pernyataan Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-pemberitahuan-banding" id=''><?= $data['pnbp_pemberitahuan_banding']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Penyerahan Memori Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 penyerahan-memori" id=''><?= $data['penyerahan_memori']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Penyerahan Kontra Memori Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 penyerahan-kontra" id=''><?= $data['penyerahan_kontra']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Relas Penyerahan Memori dan Kontra Memori Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-penyerahan-memori-kontra" id=''><?= $data['pnbp_penyerahan_memori_kontra']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Inzage Pembanding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 inzage-pembanding" id=''><?= $data['pemberitahuan_inzage_pembanding']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Inzage Terbanding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 inzage-terbanding" id=''><?= $data['pemberitahuan_inzage_terbanding']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Relas Pemberitahuan Inzage</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-inzage" id=''><?= $data['pnbp_inzage']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Biaya Banding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 biaya-banding" id=''><?= $data['biaya_banding']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Putusan Pembanding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 putusan-pembanding" id=''><?= $data['pemberitahuan_putusan_pembanding']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Putusan Terbanding</div>
                            <div class="col-1">:</div>
                            <div class="col-3 putusan-terbanding" id=''><?= $data['pemberitahuan_putusan_terbanding']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Pemberitahuan Putusan </div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-putusan" id=''><?= $data['pnbp_putusan']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Redaksi</div>
                            <div class="col-1">:</div>
                            <div class="col-3 redaksi" id=''><?= $data['redaksi']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Biaya Pengiriman Berkas</div>
                            <div class="col-1">:</div>
                            <div class="col-3 redaksi" id=''><?= $data['pengiriman_berkas']; ?></div>
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