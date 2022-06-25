<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-center">
  <div class="col p-2">
    <h1>Biaya Panjar Permohonan</h1>
  </div>
</div>
<div class="d-flex skum-wrapper">
  <div class="col-md-6 bg-white p-2 shadow">
    <fieldset>
      <div class="row mb-2">
        <div class="col">
          <a href="" class="btn btn-success" id="tambah-penggugat"><i class="fa fa-plus"></i> Tambah Pemohon</a>

          <button class="btn btn-primary next" id="next"></i>Next</button>
        </div>
      </div>
      <div id="penggugat" class="mt-2">
        <div>
          <div>
            Pemohon <span class="urutan-penggugat">1</span>
          </div>
          <div class="form-group" id='urutan-1'>
            <label for="">Propinsi</label>
            <select name="" id="" class="form-control propinsi-select"></select>
          </div>

          <div class="form-group">
            <label for="">Kab/Kota</label>
            <select name="" id="" class="form-control kota-select" disabled></select>
          </div>
          <div class="form-group">
            <label for="">Kecamatan</label>
            <select name="" id="" class="form-control kecamatan-select" disabled></select>
          </div>
          <div class="form-group">
            <label for="">Kelurahan</label>
            <select name="" id="" class="form-control kelurahan-select" disabled></select>
          </div>
        </div>


      </div>
    </fieldset>

    <fieldset class="part-2">

      <div class="row mb-2">
        <div class="col">

          <button class="btn btn-warning simpan-skum" id=""></i>Simpan SKUM</button>

          <button href="" class="btn btn-secondary previous" id="previous"></i>Prev</button>
        </div>
      </div>
      <div id="tergugat" class="mt-2">
        <div>
          <div>
            Data Pemohon
          </div>
          <div class="form-group">
            <label for="">Tanggal</label>
            <input type="date" class="form-control" id="tanggal_skum">
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" class="form-control" id="nama_penggugat">
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <textarea name="" class="form-control" id="alamat_penggugat" cols="30" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="">Nomor Telepon</label>
            <input type="text" class="form-control" id="telepon_penggugat">
          </div>
          <div>
            <button id="manual" class="btn btn-primary">Nomor Manual?</button>
          </div>
          <div class='mt-2'>
            <div class="form-group manual">
              <label for="">Nomor</label>
              <input type="text" class="form-control" id="nomor-manual">
              <label for="">Tahun</label>
              <input type="text" class="form-control" id="tahun-manual">

            </div>
          </div>

        </div>


      </div>


    </fieldset>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        Biaya Panjar Perkara Non E-Court
      </div>
      <div class="card-body">
        <div class="d-flex">
          <div class="col-8">Biaya ATK</div>
          <div class="col-1">:</div>
          <div class="col-3 atk"></div>
        </div>
        <div class="d-flex">
          <div class="col-8">Biaya Pendaftaran</div>
          <div class="col-1">:</div>
          <div class="col-3 pendaftaran" id=""></div>
        </div>
        <div class="d-flex">
          <div class="col-8">Panggilan Pemohon</div>
          <div class="col-1">:</div>
          <div class="col-3 panggilan-penggugat" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Pemberitahuan Putusan Pemohon</div>
          <div class="col-1">:</div>
          <div class="col-3 putusan-penggugat" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">PNBP Panggilan Pertama</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-panggilan" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Pemberitahuan Putusan</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-putusan" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Biaya Sumpah</div>
          <div class="col-1">:</div>
          <div class="col-3 sumpah" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Materai</div>
          <div class="col-1">:</div>
          <div class="col-3 materai" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Redaksi</div>
          <div class="col-1">:</div>
          <div class="col-3 redaksi" id=''>0</div>
        </div>
        <hr>
        <div class="d-flex">
          <div class="col-8">Jumlah</div>
          <div class="col-1">:</div>
          <div class="col-3" id='jumlah-non-ecourt'>0</div>
        </div>
      </div>
    </div>
    <div class="card mt-2">
      <div class="card-header">
        Biaya Panjar Perkara E-Court
      </div>
      <div class="card-body">
        <div class="d-flex">
          <div class="col-8">Biaya ATK</div>
          <div class="col-1">:</div>
          <div class="col-3 atk"></div>
        </div>
        <div class="d-flex">
          <div class="col-8">Biaya Pendaftaran</div>
          <div class="col-1">:</div>
          <div class="col-3 pendaftaran" id=""></div>
        </div>
        <div class="d-flex">
          <div class="col-8">Panggilan Pemohon</div>
          <div class="col-1">:</div>
          <div class="col-3">0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Pemberitahuan Putusan Pemohon</div>
          <div class="col-1">:</div>
          <div class="col-3" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">PNBP Panggilan Pertama</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-panggilan" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Pemberitahuan Putusan</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-putusan" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Biaya Sumpah</div>
          <div class="col-1">:</div>
          <div class="col-3 sumpah" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Materai</div>
          <div class="col-1">:</div>
          <div class="col-3 materai" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Redaksi</div>
          <div class="col-1">:</div>
          <div class="col-3 redaksi" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Surat Kuasa </div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp_kuasa" id=''>0</div>
        </div>
        <hr>
        <div class="d-flex">
          <div class="col-8">Jumlah</div>
          <div class="col-1">:</div>
          <div class="col-3" id='jumlah-ecourt'>0</div>

        </div>
        <div class="d-flex p-2">
          <small class="">Ditambah dengan biaya penggandaan sebesar Rp500 perlembar dikalikan sejumlah pihak dan Hakim</p>
        </div>

      </div>
    </div>
  </div>
</div>



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
<script>
  $(document).ready(function() {
    let materai = <?= $referensi['materai']; ?>;
    let redaksi = <?= $referensi['redaksi']; ?>;
    let atk = <?= $referensi['atk']; ?>;
    let pendaftaran = <?= $referensi['pendaftaran']; ?>;
    <?php if ($referensi['sumpah'] != null) : ?>
      let sumpah = <?= $referensi['sumpah']; ?>;
    <?php else : ?>
      let sumpah = 0;
    <?php endif; ?>
    let pnbp_kuasa_ecourt = <?= $referensi_ecourt['pnbp_kuasa']; ?>;
    $('.atk').html(new Intl.NumberFormat("id-ID").format(atk));
    $('.pendaftaran').html(new Intl.NumberFormat("id-ID").format(pendaftaran));
    $('.materai').html(new Intl.NumberFormat("id-ID").format(materai));
    $('.redaksi').html(new Intl.NumberFormat("id-ID").format(redaksi));
    $('.sumpah').html(new Intl.NumberFormat("id-ID").format(sumpah));
    $('.pnbp_kuasa').html(new Intl.NumberFormat("id-ID").format(pnbp_kuasa_ecourt));
    $('.part-2').hide();

    var current = 1,
      current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function() {
      current_step = $(this).parents('fieldset');
      next_step = $(this).parents('fieldset').next();
      next_step.show();
      current_step.hide();

    });
    $(".previous").click(function() {
      current_step = $(this).parents('fieldset');
      next_step = $(this).parents('fieldset').prev();
      next_step.show();
      current_step.hide();

    });
    start_provinsi('penggugat', 1)


    // Dinamic form Penggugat
    $('#tambah-penggugat').click(function(e) {


      e.preventDefault();
      let nomor = parseInt($('.urutan-penggugat').last().html()) + 1;
      $('#penggugat').append(`
     
      <div>
      <hr>
      <div>

        Permohonan <span class="urutan-penggugat">${nomor}</span>
        <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

      </div>
      <div class="form-group" id="urutan-${nomor}">
        <label for="">Propinsi</label>
        <select name="" id="" class="form-control propinsi-select"></select>
      </div>

      <div class="form-group">
        <label for="">Kab/Kota</label>
        <select name="" id="" class="form-control kota-select" disabled></select>
      </div>
      <div class="form-group">
        <label for="">Kecamatan</label>
        <select name="" id="" class="form-control kecamatan-select" disabled></select>
      </div>
      <div class="form-group">
        <label for="">Kelurahan</label>
        <select name="" id="" class="form-control kelurahan-select" disabled></select>
      </div>
    </div>`)
      start_provinsi('penggugat', nomor)
    })


    async function start_provinsi(pihak = null, nomor = null) {
      await $.ajax({
        type: "get",
        url: "<?= base_url('simulasi/cari_propinsi'); ?>",
        // data: "data",
        dataType: "json",
        success: function(response) {
          if (pihak == 'penggugat') {

            $(`#${pihak}`).find(`#urutan-${nomor} .propinsi-select`).append(`<option disabled selected>Pilih Propinsi</option>`);
            response.forEach(element => {

              $(`#${pihak}`).find(`#urutan-${nomor} .propinsi-select`).append(`<option value='${element.id}'>${element.text}</option>`);
            });
          } else {
            $(`#${pihak}`).find(`#urutan-t-${nomor} .propinsi-select`).append(`<option disabled selected>Pilih Propinsi</option>`);
            response.forEach(element => {

              $(`#${pihak}`).find(`#urutan-t-${nomor} .propinsi-select`).append(`<option value='${element.id}'>${element.text}</option>`);
            });
          }
          // $('.propinsi-select').trigger('change')
          console.log(response)

        }
      });
      return true
    }

    // Penggugat //////////////////////////
    $('#penggugat').on('change', '.propinsi-select', function(e) {
      let this_element = $(this);
      e.preventDefault();
      let val = $(this).val();
      console.log(val);
      console.log(this_element);

      $(this).parent().siblings().find('.kota-select').removeAttr('disabled');
      $(this).parent().siblings().find('.kota-select option').remove();
      $(this).parent().siblings().find('.kecamatan-select option').remove();
      $(this).parent().siblings().find('.kelurahan-select option').remove();
      $.ajax({
        type: "post",
        data: {
          propinsi_code: val,
        },
        url: "<?= base_url('simulasi/cari_kota'); ?>",

        dataType: "json",
        success: function(response) {
          this_element.parent().siblings().find('.kota-select').append(`<option disabled selected>Pilih Kab/Kota</option>`);
          response.forEach(element => {
            this_element.parent().siblings().find('.kota-select').append(`<option>${element.kota}</option>`);
          });
          console.log(response)
        }
      });

    })

    $('#penggugat').on('change', '.kota-select', function(e) {
      let this_element = $(this);
      e.preventDefault();
      let val = $(this).val();
      console.log(val);
      $(this).parent().siblings().find('.kecamatan-select').removeAttr('disabled');
      $(this).parent().siblings().find('.kecamatan-select option').remove();
      $(this).parent().siblings().find('.kelurahan-select option').remove();
      $.ajax({
        type: "post",
        data: {
          kabupaten: val,
        },
        url: "<?= base_url('simulasi/cari_kecamatan'); ?>",

        dataType: "json",
        success: function(response) {
          this_element.parent().siblings().find('.kecamatan-select').append(`<option disabled selected>Pilih Kecamatan</option>`);
          response.forEach(element => {
            this_element.parent().siblings().find('.kecamatan-select').append(`<option>${element.kecamatan}</option>`);
          });
          console.log(response)
        }

      });
    })
    let kecamatan_pemohon = '';
    $('#penggugat').on('change', '.kecamatan-select', function(e) {
      let this_element = $(this);
      e.preventDefault();
      let val = $(this).val();
      kecamatan_pemohon = $(this).val();
      console.log(val);
      $(this).parent().siblings().find('.kelurahan-select').removeAttr('disabled');
      $(this).parent().siblings().find('.kelurahan-select option').remove();
      $.ajax({
        type: "post",
        data: {
          kecamatan: val,
        },
        url: "<?= base_url('simulasi/cari_kelurahan'); ?>",

        dataType: "json",
        success: function(response) {
          this_element.parent().siblings().find('.kelurahan-select').append(`<option disabled selected>Pilih Kelurahan</option>`);
          response.forEach(element => {
            this_element.parent().siblings().find('.kelurahan-select').append(`<option>${element.kelurahan}</option>`);
          });
          console.log(response)
        }
      });
    });
    let biaya_panggilan_penggugat = [];
    let sum_panggilan_penggugat = 0;
    let sum_putusan_penggugat = 0;
    let pnbp_panggilan = 0;
    let grand_total = 0;
    let grand_total_ecourt = 0;


    let pnbp_putusan = 0;

    $('#penggugat').on('change', '.kelurahan-select', function(e) {
      e.preventDefault();
      let val = $(this).val();
      console.log(val);
      let urutan = $(this).parent().siblings().find('.urutan-penggugat').html();
      console.log(urutan);
      biaya_panggilan_penggugat = biaya_panggilan_penggugat.filter(item => item.id_penggugat != urutan);


      $.ajax({
        type: "post",
        data: {
          kecamatan: kecamatan_pemohon,
          kelurahan: val,
        },
        url: "<?= base_url('simulasi/biaya_panggilan'); ?>",

        dataType: "json",
        success: function(response) {
          biaya_panggilan_penggugat.push({
            'id_penggugat': parseInt(urutan),
            'nilai': parseInt(response)
          });
          console.log(response)
          console.log(biaya_panggilan_penggugat);
          sum_panggilan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 2;

          sum_putusan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

          $('.panggilan-penggugat').html(new Intl.NumberFormat("id-ID").format(sum_panggilan_penggugat));
          $('.putusan-penggugat').html(new Intl.NumberFormat("id-ID").format(sum_putusan_penggugat));
          pnbp_panggilan = (biaya_panggilan_penggugat.length) * <?= $referensi['pnbp_panggilan']; ?>;
          pnbp_putusan = (biaya_panggilan_penggugat.length) * <?= $referensi['pnbp_putusan']; ?>;
          $('.pnbp-panggilan').html(new Intl.NumberFormat("id-ID").format(pnbp_panggilan));
          $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));
          grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_putusan_penggugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
          grand_total_ecourt = atk + pendaftaran + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;
          $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));
          $('#jumlah-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total_ecourt));
        }
      });

    });

    $('#penggugat').on('click', '.delete-btn', function(e) {
      e.preventDefault();

      let urutan = $(this).parent().find('.urutan-penggugat').html();
      console.log(urutan);
      biaya_panggilan_penggugat = biaya_panggilan_penggugat.filter(item => item.id_penggugat != urutan);
      sum_panggilan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 3;

      sum_putusan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

      $('.panggilan-penggugat').html(new Intl.NumberFormat("id-ID").format(sum_panggilan_penggugat));
      $('.putusan-penggugat').html(new Intl.NumberFormat("id-ID").format(sum_putusan_penggugat));
      pnbp_panggilan = (biaya_panggilan_penggugat.length) * <?= $referensi['pnbp_panggilan']; ?>;
      pnbp_putusan = (biaya_panggilan_penggugat.length) * <?= $referensi['pnbp_putusan']; ?>;
      $('.pnbp-panggilan').html(new Intl.NumberFormat("id-ID").format(pnbp_panggilan));
      $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));
      grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_putusan_penggugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
      grand_total_ecourt = atk + pendaftaran + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;
      $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));
      $('#jumlah-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total_ecourt));
      $(this).parent().parent().remove();


    })

    $('.skum-wrapper').on('click', '.simpan-skum', function(e) {
      e.preventDefault();
      let tanggal_skum = $('#tanggal_skum').val();
      let nama = $('#nama_penggugat').val();
      let alamat = $('#alamat_penggugat').val();
      let telepon = $('#telepon_penggugat').val();
      let nomor_manual = $('#nomor-manual').val();
      let tahun_manual = $('#tahun-manual').val();
      let button = $(this);
      $.ajax({
        type: "post",
        url: "<?= base_url('skum/insert_skum_permohonan'); ?>",
        data: {
          atk,
          pendaftaran,
          redaksi,
          materai,
          pnbp_panggilan,
          pnbp_putusan,
          sumpah,
          sum_panggilan_penggugat,

          sum_putusan_penggugat,

          grand_total,
          nama,
          alamat,
          telepon,
          tanggal_skum,
          nomor_manual,
          tahun_manual

        },
        dataType: "json",
        beforeSend: function() {
          button.attr('disabled', true);
          button.html('<i class="fa fa-spinner fa-spin"></i>');

        },
        success: function(response) {
          console.log(response)
          if (response.msg == 'success') {
            button.removeAttr('disabled');
            button.html('Simpan SKUM');
            $(location).attr('href', '<?= base_url('skum/v_main_skum_permohonan'); ?>')

          }
        }
      });

    })
    $('.manual').hide();
    $('#manual').click(e => {
      e.preventDefault();
      $('.manual').toggle(1000);
    })

  })
</script>
<?= $this->endSection(); ?>