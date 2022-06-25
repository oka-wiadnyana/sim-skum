<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-center">
  <div class="col p-2 text-center">
    <h1>Biaya Tk. Banding</h1>
  </div>
</div>
<div class="d-flex justify-content-center">
  <div class="col-md-6 bg-white p-2 shadow">

    <div class="mt-2">

      <form action="<?= base_url('skum/simpan_ref_biaya_tk_banding'); ?>" method="post">
        <fieldset>

          <div class="form-group">
            <label for="">Pendaftaran</label>
            <input name="pendaftaran" id="" class="form-control" value="<?= ($data) ? number_format($data['pendaftaran'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Penyerahan Akta</label>
            <input name="penyerahan_akta" id="" class="form-control" value="<?= ($data) ? number_format($data['penyerahan_akta'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">Biaya Banding</label>
            <input name="biaya_banding" id="" class="form-control" value="<?= ($data) ? number_format($data['biaya_banding'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Pemb Pernyataan Banding</label>
            <input name="relas_pemberitahuan_pernyataan" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_pemberitahuan_pernyataan'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Penyerahan Memori dan Kontra</label>
            <input name="relas_penyerahan_memori_kontra" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_penyerahan_memori_kontra'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Pemberitahuan Inzage</label>
            <input name="relas_inzage" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_inzage'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Relas Putusan Sela</label>
            <input name="relas_putusan_sela" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_putusan_sela'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Relas Panggilan Pemeriksaan Sela</label>
            <input name="relas_panggilan_sela" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_panggilan_sela'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Relas Pemberitahuan Putusan </label>
            <input name="relas_putusan" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_putusan'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Pencabutan</label>
            <input name="pencabutan" id="" class="form-control" value="<?= ($data) ? number_format($data['pencabutan'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Relas Pemberitahuan Pencabutan</label>
            <input name="relas_pemberitahuan_pencabutan" id="" class="form-control" value="<?= ($data) ? number_format($data['relas_pemberitahuan_pencabutan'], 0, ',', '.') : 0; ?>"></input>
          </div>

          <div class="form-group">
            <label for="">Redaksi</label>
            <input name="redaksi" id="" class="form-control" value="<?= ($data) ? number_format($data['redaksi'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">Biaya Pengiriman Berkas</label>
            <input name="pengiriman_berkas" id="" class="form-control" value="<?= ($data) ? number_format($data['pengiriman_berkas'], 0, ',', '.') : 0; ?>"></input>
          </div>


        </fieldset>
        <div>
          <button class="btn btn-primary modify">Ubah</button>
          <button type="submit" class="btn btn-primary submit">Simpan</button>
        </div>
      </form>


    </div>


  </div>

</div>

<script>
  $(document).ready(function() {
    <?php if ($data) : ?>
      $('.modify').show();
      $('.submit').hide();
      $('fieldset').attr('disabled', true)
    <?php else : ?>
      $('.submit').show();
      $('.modify').hide();
    <?php endif; ?>

    $('.modify').click(function(e) {
      e.preventDefault();
      $('fieldset').removeAttr('disabled');
      $('.submit').show();
      $('.modify').hide();
    })


  });
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