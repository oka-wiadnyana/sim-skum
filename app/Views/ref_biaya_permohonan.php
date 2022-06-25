<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-center">
  <div class="col p-2 text-center">
    <h1>Biaya Permohonan</h1>
  </div>
</div>
<div class="d-flex justify-content-center">
  <div class="col-md-6 bg-white p-2 shadow">

    <div class="mt-2">

      <form action="<?= base_url('skum/simpan_ref_biaya_permohonan'); ?>" method="post">
        <fieldset>
          <div class="form-group">
            <label for="">ATK</label>
            <input name="atk" id="" class="form-control" value="<?= ($data) ? number_format($data['atk'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">Pendaftaran</label>
            <input name="pendaftaran" id="" class="form-control" value="<?= ($data) ? number_format($data['pendaftaran'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">PNBP Panggilan</label>
            <input name="pnbp_panggilan" id="" class="form-control" value="<?= ($data) ? number_format($data['pnbp_panggilan'], 0, ',', '.') : 0; ?>"></input>
          </div>

          <div class="form-group">
            <label for="">PNBP Putusan</label>
            <input name="pnbp_putusan" id="" class="form-control" value="<?= ($data) ? number_format($data['pnbp_putusan'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">Materai</label>
            <input name="materai" id="" class="form-control" value="<?= ($data) ? number_format($data['materai'], 0, ',', '.') : 0; ?>"></input>
          </div>
          <div class="form-group">
            <label for="">Redaksi</label>
            <input name="redaksi" id="" class="form-control" value="<?= ($data) ? number_format($data['redaksi'], 0, ',', '.') : 0; ?>"></input>
          </div>

          <div class="form-group">
            <label for="">Sumpah</label>
            <input name="sumpah" id="" class="form-control" value="<?= ($data) ? number_format($data['sumpah'], 0, ',', '.') : 0; ?>"></input>
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