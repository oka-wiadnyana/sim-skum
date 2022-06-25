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
                            <div class="col-8">PNBP Penyerahan Akta PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 penyerahan-akta" id=""><?= $data['pnbp_penyerahan_akta']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Pernyataan PK dan Alasan PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pemberitahuan-kasasi" id=''><?= $data['pemberitahuan_pk_memori']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Relas Pemberitahuan Pernyataan PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-pemberitahuan-pk" id=''><?= $data['pnbp_pemberitahuan_pk_memori']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Penyerahan Jawaban PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 penyerahan-kontra" id=''><?= $data['penyerahan_kontra']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">PNBP Relas Penyerahan Jawaban PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 pnbp-penyerahan-memori-kontra" id=''><?= $data['pnbp_penyerahan_kontra']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Biaya PK</div>
                            <div class="col-1">:</div>
                            <div class="col-3 biaya-kasasi" id=''><?= $data['biaya_pk']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Putusan Pemohon</div>
                            <div class="col-1">:</div>
                            <div class="col-3 putusan-pemohon" id=''><?= $data['pemberitahuan_putusan_pemohon']; ?></div>
                        </div>

                        <div class="d-flex">
                            <div class="col-8">Pemberitahuan Putusan Termohon</div>
                            <div class="col-1">:</div>
                            <div class="col-3 putusan-termohon" id=''><?= $data['pemberitahuan_putusan_termohon']; ?></div>
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
                            <div class="col-8">PNBP Novum</div>
                            <div class="col-1">:</div>
                            <div class="col-3 redaksi" id=''><?= $data['pnbp_novum']; ?></div>
                        </div>
                        <div class="d-flex">
                            <div class="col-8">Pengiriman berkas</div>
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