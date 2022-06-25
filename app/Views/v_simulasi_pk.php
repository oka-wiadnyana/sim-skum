<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div class="d-flex justify-content-center">
  <div class="col p-2">
    <h1>Simulasi Biaya Panjar PK</h1>
  </div>
</div>
<div class="d-flex skum-wrapper">
  <div class="col-md-6 bg-white p-2 shadow">
    <fieldset>
      <div class="row mb-2">
        <div class="col">
          <a href="" class="btn btn-success" id="tambah-penggugat"><i class="fa fa-plus"></i> Tambah Pemohon Kasasi PK</a>

          <button class="btn btn-primary next" id="next"></i>Next</button>
        </div>
      </div>
      <div id="penggugat" class="mt-2">
        <div>
          <div>
            Pemohon PK <span class="urutan-penggugat">1</span>
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
          <a href="" class="btn btn-danger" id="tambah-uraian"><i class="fa fa-plus"></i> Tambah Termohon PK</a>

          <button class="btn btn-primary next" id="next"></i>Next</button>
          <button href="" class="btn btn-secondary previous" id="previous"></i>Prev</button>
        </div>
      </div>
      <div id="tergugat" class="mt-2">
        <div>
          <div>

            Termohon PK <span class="urutan">1</span>
          </div>
          <div class="form-group" id='urutan-t-1'>
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
    <fieldset class="part-3">

      <div class="row mb-2">
        <div class="col">

          <button class="btn btn-warning simpan-skum" id=""></i>Simpan SKUM</button>

          <button href="" class="btn btn-secondary previous" id="previous"></i>Prev</button>
        </div>
      </div>
      <div id="tergugat" class="mt-2">
        <div>
          <div>
            Data Pemohon PK
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
        Biaya Panjar Perkara
      </div>
      <div class="card-body">
        <div class="d-flex">
          <div class="col-8">Pendaftaran</div>
          <div class="col-1">:</div>
          <div class="col-3 pendaftaran"></div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Penyerahan Akta PK</div>
          <div class="col-1">:</div>
          <div class="col-3 penyerahan-akta" id=""></div>
        </div>
        <div class="d-flex">
          <div class="col-8">Pemberitahuan Pernyataan PK dan Alasan PM</div>
          <div class="col-1">:</div>
          <div class="col-3 pemberitahuan-pk" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Relas Pemberitahuan Pernyataan PK</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-pemberitahuan-pk" id=''>0</div>
        </div>


        <div class="d-flex">
          <div class="col-8">Penyerahan Jawaban PK</div>
          <div class="col-1">:</div>
          <div class="col-3 penyerahan-kontra" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Relas Penyerahan Jawaban PK</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-penyerahan-kontra" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Biaya PK</div>
          <div class="col-1">:</div>
          <div class="col-3 biaya-pk" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Pemberitahuan Putusan Pemohon PK</div>
          <div class="col-1">:</div>
          <div class="col-3 putusan-pemohon" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Pemberitahuan Putusan Termohon PK</div>
          <div class="col-1">:</div>
          <div class="col-3 putusan-termohon" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Pemberitahuan Putusan </div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-putusan" id=''>0</div>
        </div>

        <div class="d-flex">
          <div class="col-8">Redaksi</div>
          <div class="col-1">:</div>
          <div class="col-3 redaksi" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">PNBP Penyumpahan Novum</div>
          <div class="col-1">:</div>
          <div class="col-3 pnbp-novum" id=''>0</div>
        </div>
        <div class="d-flex">
          <div class="col-8">Biaya Pengiriman</div>
          <div class="col-1">:</div>
          <div class="col-3 pengiriman_berkas" id=''>0</div>
        </div>

        <hr>
        <div class="d-flex">
          <div class="col-8">Jumlah</div>
          <div class="col-1">:</div>
          <div class="col-3" id='jumlah-non-ecourt'>0</div>
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
    let pendaftaran = <?= $referensi['pendaftaran']; ?>;
    // let penyerahan_akta = <?= $referensi['penyerahan_akta']; ?>;
    let biaya_pk = <?= $referensi['biaya_pk']; ?>;
    let biaya_kirim = <?= $referensi['pengiriman_berkas']; ?>;
    let redaksi = <?= $referensi['redaksi']; ?>;
    let novum = <?= $referensi['novum']; ?>;

    $('.pendaftaran').html(new Intl.NumberFormat("id-ID").format(pendaftaran));

    $('.biaya-pk').html(new Intl.NumberFormat("id-ID").format(biaya_pk));
    $('.pengiriman_berkas').html(new Intl.NumberFormat("id-ID").format(biaya_kirim));
    $('.redaksi').html(new Intl.NumberFormat("id-ID").format(redaksi));
    $('.pnbp-novum').html(new Intl.NumberFormat("id-ID").format(novum));

    $('.part-2').hide();
    $('.part-3').hide();
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
    start_provinsi('tergugat', 1)


    // Dinamic form Penggugat
    $('#tambah-penggugat').click(function(e) {


      e.preventDefault();
      let nomor = parseInt($('.urutan-penggugat').last().html()) + 1;
      $('#penggugat').append(`
     
      <div>
      <hr>
      <div>

        Pemohon PK <span class="urutan-penggugat">${nomor}</span>
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

    // Dinamic form Tergugat
    $('#tambah-uraian').click(function(e) {


      e.preventDefault();
      let nomor = parseInt($('.urutan').last().html()) + 1;
      $('#tergugat').append(`
     
      <div>
      <hr>
      <div>

        Termohon PK <span class="urutan">${nomor}</span>
        <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

      </div>
      <div class="form-group"  id="urutan-t-${nomor}">
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
      start_provinsi('tergugat', nomor)
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
    let kecamatan_penggugat = ''
    $('#penggugat').on('change', '.kecamatan-select', function(e) {
      let this_element = $(this);
      e.preventDefault();
      kecamatan_penggugat = $(this).val();
      let val = $(this).val();
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
    let pemberitahuan_kontra = [];

    let sum_pemberitahuan_pernyataan = 0;

    let sum_penyerahan_kontra = 0;

    let sum_putusan_pemohon = 0;
    let sum_putusan_termohon = 0;

    let pnbp_pemberitahuan_pernyataan = 0;
    let pnbp_penyerahan_akta = 0;
    let pnbp_penyerahan_kontra = 0;

    let pnbp_putusan = 0;

    let grand_total = 0;
    let grand_total_ecourt = 0;


    $('#penggugat').on('change', '.kelurahan-select', function(e) {
      e.preventDefault();
      let val = $(this).val();
      console.log(val);
      let urutan = $(this).parent().siblings().find('.urutan-penggugat').html();
      console.log(urutan);
      pemberitahuan_kontra = pemberitahuan_kontra.filter(item => item.id_penggugat != urutan);


      $.ajax({
        type: "post",
        data: {
          kecamatan: kecamatan_penggugat,
          kelurahan: val,
        },
        url: "<?= base_url('simulasi/biaya_panggilan'); ?>",

        dataType: "json",
        success: function(response) {
          pemberitahuan_kontra.push({
            'id_penggugat': parseInt(urutan),
            'nilai': parseInt(response)
          });
          console.log(response)
          console.log(pemberitahuan_kontra);

          // Relas
          sum_penyerahan_kontra = sum_putusan_pemohon = pemberitahuan_kontra.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

          console.log(sum_penyerahan_kontra);

          // PNBP
          pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
          pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
          pnbp_penyerahan_kontra = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_kontra']; ?>;

          pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;

          $('.penyerahan-akta').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_akta));
          $('.penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(sum_penyerahan_kontra));
          $('.pnbp-penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_kontra));

          $('.putusan-pemohon').html(new Intl.NumberFormat("id-ID").format(sum_putusan_pemohon));
          $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));



          grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_pk + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_kontra + sum_putusan_pemohon + sum_putusan_termohon + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_kontra + pnbp_putusan + biaya_kirim + novum;
          console.log(grand_total);

          $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));

        }
      });

    });

    $('#penggugat').on('click', '.delete-btn', function(e) {
      e.preventDefault();

      let urutan = $(this).parent().find('.urutan-penggugat').html();
      console.log(urutan);
      pemberitahuan_kontra = pemberitahuan_kontra.filter(item => item.id_penggugat != urutan);

      // Relas
      sum_penyerahan_kontra = sum_putusan_pemohon = pemberitahuan_kontra.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

      console.log(sum_penyerahan_kontra);

      // PNBP
      pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
      pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
      pnbp_penyerahan_kontra = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_kontra']; ?>;

      pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;

      $('.penyerahan-akta').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_akta));
      $('.penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(sum_penyerahan_kontra));
      $('.pnbp-penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_kontra));

      $('.putusan-pemohon').html(new Intl.NumberFormat("id-ID").format(sum_putusan_pemohon));
      $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));



      grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_pk + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_kontra + sum_putusan_pemohon + sum_putusan_termohon + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_kontra + pnbp_putusan + biaya_kirim + novum;
      console.log(grand_total);

      $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));
      $(this).parent().parent().remove();


    })

    // Tergugat /////////////////////////////////
    $('#tergugat').on('change', '.propinsi-select', function(e) {
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



    $('#tergugat').on('change', '.kota-select', function(e) {
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
    let kecamatan_tergugat = ''
    $('#tergugat').on('change', '.kecamatan-select', function(e) {
      let this_element = $(this);
      kecamatan_tergugat = $(this).val();
      e.preventDefault();
      let val = $(this).val();
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
    let pemberitahuan_pernyataan = [];;

    $('#tergugat').on('change', '.kelurahan-select', function(e) {
      e.preventDefault();
      let val = $(this).val();
      console.log(val);
      let urutan = $(this).parent().siblings().find('.urutan').html();
      console.log(urutan);
      pemberitahuan_pernyataan = pemberitahuan_pernyataan.filter(item => item.id_tergugat != urutan);


      $.ajax({
        type: "post",
        data: {
          kecamatan: kecamatan_tergugat,
          kelurahan: val,
        },
        url: "<?= base_url('simulasi/biaya_panggilan'); ?>",

        dataType: "json",
        success: function(response) {
          pemberitahuan_pernyataan.push({
            'id_tergugat': parseInt(urutan),
            'nilai': parseInt(response)
          });
          console.log(response)
          console.log(pemberitahuan_pernyataan);
          sum_pemberitahuan_pernyataan = sum_putusan_termohon = pemberitahuan_pernyataan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


          // PNBP
          pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
          pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
          pnbp_penyerahan_kontra = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_kontra']; ?>;

          pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;


          $('.penyerahan-akta').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_akta));
          $('.pemberitahuan-pk').html(new Intl.NumberFormat("id-ID").format(sum_pemberitahuan_pernyataan));
          $('.pnbp-pemberitahuan-pk').html(new Intl.NumberFormat("id-ID").format(pnbp_pemberitahuan_pernyataan));

          $('.pnbp-penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_kontra));


          $('.putusan-termohon').html(new Intl.NumberFormat("id-ID").format(sum_putusan_termohon));
          $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));


          // 
          grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_pk + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_kontra + sum_putusan_pemohon + sum_putusan_termohon + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_kontra + pnbp_putusan + biaya_kirim + novum;
          console.log(grand_total);
          $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));

        }
      });

    });

    $('#tergugat').on('click', '.delete-btn', function(e) {
      e.preventDefault();

      let urutan = $(this).parent().find('.urutan').html();
      console.log(urutan);
      console.log(pemberitahuan_pernyataan);
      pemberitahuan_pernyataan = pemberitahuan_pernyataan.filter(item => item.id_tergugat != urutan);
      sum_pemberitahuan_pernyataan = sum_putusan_termohon = pemberitahuan_pernyataan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


      // PNBP
      pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
      pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
      pnbp_penyerahan_kontra = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_kontra']; ?>;

      pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;


      $('.penyerahan-akta').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_akta));
      $('.pemberitahuan-pk').html(new Intl.NumberFormat("id-ID").format(sum_pemberitahuan_pernyataan));
      $('.pnbp-pemberitahuan-pk').html(new Intl.NumberFormat("id-ID").format(pnbp_pemberitahuan_pernyataan));

      $('.pnbp-penyerahan-kontra').html(new Intl.NumberFormat("id-ID").format(pnbp_penyerahan_kontra));


      $('.putusan-termohon').html(new Intl.NumberFormat("id-ID").format(sum_putusan_termohon));
      $('.pnbp-putusan').html(new Intl.NumberFormat("id-ID").format(pnbp_putusan));


      // 
      grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_pk + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_kontra + sum_putusan_pemohon + sum_putusan_termohon + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_kontra + pnbp_putusan + biaya_kirim + novum;
      console.log(grand_total);
      $('#jumlah-non-ecourt').html(new Intl.NumberFormat("id-ID").format(grand_total));
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
        url: "<?= base_url('skum/insert_skum_pk'); ?>",
        data: {

          pendaftaran,
          pnbp_penyerahan_akta,
          biaya_pk,
          redaksi,
          sum_pemberitahuan_pernyataan,

          sum_penyerahan_kontra,

          sum_putusan_pemohon,
          sum_putusan_termohon,
          pnbp_pemberitahuan_pernyataan,
          pnbp_penyerahan_kontra,

          pnbp_putusan,
          biaya_kirim,
          novum,
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
            $(location).attr('href', '<?= base_url('skum/v_main_skum_pk'); ?>')

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