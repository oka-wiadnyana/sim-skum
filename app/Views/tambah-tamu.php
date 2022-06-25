<?= $this->extend('layout/main'); ?>
<?= $this->section('main-content'); ?>
<div class="section-header">
    <h1>Tambah Tamu</h1>

</div>

<div class="section-body">

    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">

                <div class="card-body">

                    <form action="<?= base_url('tamu/insert_tamu'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <?php date_default_timezone_set("Asia/Bangkok"); ?>
                            <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" readonly name="tanggal">
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama_tamu" value="<?= old('nama_tamu'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="alamat_tamu"><?= old('alamat_tamu'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control phone-number" name="nomor_telepon" value="<?= old('nomor_telepon'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1" class="form-label">Alasan</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" name="alasan"><?= old('alasan'); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <select class="form-control" name="tujuan">
                                <option selected disabled>Pilih tujuan..</option>
                                <?php foreach ($tujuan as $t) : ?>
                                    <option value="<?= $t['id']; ?>" <?= (old('tujuan') == $t['id']) ? 'selected' : ''; ?>><?= $t['tujuan']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Perlu alat bantu?</label>
                            <select class="form-control" id="ask-alat-bantu" name="ask-alat-bantu">
                                <option selected disabled>Pilih..</option>
                                <option value="Y">Ya</option>
                                <option value="T">Tidak</option>

                            </select>
                        </div>
                        <div class="form-group" id="alat-bantu">
                            <label>Alat Bantu</label>
                            <select class="form-control" name="alat_bantu">
                                <option selected disabled>Pilih..</option>
                                <?php foreach ($alat_bantu as $t) : ?>
                                    <?php if ($t['alat_bantu'] == 'Tanpa alat bantu') {
                                        continue;
                                    }; ?>
                                    <option value="<?= $t['id']; ?>"><?= $t['alat_bantu']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Perlu pendamping?</label>
                            <select class="form-control" id="ask-pendamping" name="ask-pendamping">
                                <option selected disabled>Pilih..</option>
                                <option value="Y">Ya</option>
                                <option value="T">Tidak</option>

                            </select>
                        </div>
                        <div class="form-group" id="pendamping">
                            <label>Pendamping</label>
                            <select class="form-control" name="pendamping">
                                <option selected disabled>Pilih..</option>
                                <?php foreach ($pendamping as $t) : ?>
                                    <?php if ($t['nama'] == 'Tanpa pendamping') {
                                        continue;
                                    }; ?>
                                    <option value="<?= $t['id']; ?>"><?= $t['nama']; ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nomor Agenda Manual?</label>
                            <select class="form-control" id="ask-nomor" name="ask-nomor">
                                <option selected disabled>Pilih..</option>
                                <option value="Y">Ya</option>
                                <option value="T">Tidak</option>

                            </select>
                        </div>
                        <div class="form-group manual">
                            <label>Nomor</label>
                            <input type="text" class="form-control" name="nomor_manual">
                        </div>
                        <div class="form-group manual">
                            <label>Tahun</label>
                            <input type="text" class="form-control" name="tahun_manual">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= base_url('tamu'); ?>" class="btn btn-warning">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    $(document).ready(function() {
        $('.propinsi').select2({
            ajax: {
                url: '<?= base_url('simulasi/cari_propinsi'); ?>',
                dataType: 'json',

                delay: 250,
                // error: function(xhr, ajaxOptions, thrownError) {
                //     alert(xhr.status + '\n' + xhr.responseText + '\n' + thrownError)
                // },
                processResults: function(data) {
                    console.log(data)

                    return {
                        results: data

                    };
                },
                cache: true
            },
            minimumInputLength: 12,
            language: {
                inputTooShort: function() {
                    return '';
                },
                searching: function() {
                    return 'Mencari Data..';
                }
            },
        });
        let ask_alat_bantu = $('#ask-alat-bantu');
        let ask_pendamping = $('#ask-pendamping');
        let ask_nomor = $('#ask-nomor');
        let alat_bantu = $('#alat-bantu');
        let pendamping = $('#pendamping');

        alat_bantu.hide();
        pendamping.hide();
        $('.manual').hide();

        ask_alat_bantu.change(function() {
            if (ask_alat_bantu.val() == 'Y') {
                alat_bantu.show(500);
            } else {
                alat_bantu.hide(500);
            }
        })

        ask_pendamping.change(function() {
            if (ask_pendamping.val() == 'Y') {
                pendamping.show(500);
            } else {
                pendamping.hide(500);
            }
        })

        ask_nomor.change(function() {
            if (ask_nomor.val() == 'Y') {
                $('.manual').show(500);
            } else {
                $('.manual').hide(500);
            }
        })
    })
</script>
<?php $this->endSection(); ?>