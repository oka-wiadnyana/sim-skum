<?= $this->extend('layout-user/main'); ?>
<?= $this->section('main-content'); ?>
<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="row justify-content-center skum-wrapper">
      <div class="col-lg-11">
        <div class="row pt-5 pb-5 ">
          <div class="d-flex justify-content-center">
            <div class="col p-2">
              <h1>Simulasi Biaya Panjar Banding</h1>
            </div>
          </div>
          <div class="d-flex skum-wrapper">
            <div class="col bg-white p-2 shadow">
              <fieldset>
                <div class="row mb-2">
                  <div class="col">
                    <a href="" class="btn btn-success" id="tambah-penggugat"><i class="fa fa-plus"></i> Tambah Pembanding</a>

                    <button class="btn btn-primary next" id="next"></i>Next</button>
                  </div>
                </div>
                <div id="penggugat" class="mt-2">
                  <div>
                    <div>
                      Pembanding <span class="urutan-penggugat">1</span>
                    </div>
                    <div class="form-group" id="urutan-1">
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
                    <a href="" class="btn btn-danger" id="tambah-uraian"><i class="fa fa-plus"></i> Tambah Terbanding</a>

                    <button href="" class="btn btn-secondary previous" id="previous"></i>Prev</button>
                    <button class="btn btn-warning hitung-skum" id="hitung-skum"></i>Hitung SKUM</button>
                  </div>
                </div>
                <div id="tergugat" class="mt-2">
                  <div>
                    <div>

                      Terbanding <span class="urutan">1</span>
                    </div>
                    <div class="form-group" id="urutan-t-1">
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
            </div>
          </div>
        </div>

      </div>


      <script>
        $(document).ready(function() {
          let pendaftaran = <?= $referensi['pendaftaran']; ?>;
          // let penyerahan_akta = <?= $referensi['penyerahan_akta']; ?>;
          let biaya_banding = <?= $referensi['biaya_banding']; ?>;
          let biaya_kirim = <?= $referensi['pengiriman_berkas']; ?>;
          let redaksi = <?= $referensi['redaksi']; ?>;
          let pnbp_kuasa_ecourt = <?= $referensi_ecourt['pnbp_kuasa']; ?>;

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
          start_provinsi('tergugat', 1)


          // Dinamic form Penggugat
          $('#tambah-penggugat').click(function(e) {


            e.preventDefault();
            let nomor = parseInt($('.urutan-penggugat').last().html()) + 1;
            $('#penggugat').append(`
     
      <div>
      <hr>
      <div>

        Pembanding <span class="urutan-penggugat">${nomor}</span>
        <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

      </div>
      <div class="form-group"  id='urutan-${nomor}'>
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

        Terbanding <span class="urutan">${nomor}</span>
        <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

      </div>
      <div class="form-group" id="urutan-t-${nomor}">
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

          let sum_penyerahan_memori = 0;
          let sum_penyerahan_kontra = 0;
          let sum_inzage_pembanding = 0;
          let sum_inzage_terbanding = 0;
          let sum_putusan_sela_pembanding = 0;
          let sum_putusan_sela_terbanding = 0;
          let sum_panggilan_sela = 0;
          let sum_putusan_pembanding = 0;
          let sum_putusan_terbanding = 0;
          let sum_pemberitahuan_pencabutan = 0;
          let pnbp_pemberitahuan_pernyataan = 0;
          let pnbp_pemberitahuan_pernyataan_ecourt = 0;
          let pnbp_penyerahan_akta = 0;
          let pnbp_penyerahan_memori_kontra = 0;
          let pnbp_penyerahan_memori_ecourt = 0;
          let pnbp_penyerahan_memori_kontra_ecourt = 0;

          let pnbp_inzage = 0;

          let pnbp_putusan_sela = 0;
          let pnbp_panggilan_sela = 0;
          let pnbp_putusan = 0;
          let pnbp_putusan_pembanding_ecourt = 0;
          let pnbp_putusan_terbanding_ecourt = 0;
          let pnbp_pencabutan = 0;


          let pnbp_pemberitahuan_pencabutan = 0;
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
                sum_penyerahan_kontra = sum_inzage_pembanding = sum_putusan_sela_pembanding = sum_panggilan_sela = sum_putusan_sela_pembanding = sum_putusan_pembanding = pemberitahuan_kontra.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

                console.log(sum_penyerahan_kontra);

                // PNBP
                pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
                pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
                pnbp_pemberitahuan_pernyataan_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
                pnbp_penyerahan_memori_kontra = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_penyerahan_memori_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_penyerahan_memori_kontra_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_inzage = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_inzage']; ?>;

                pnbp_putusan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan_sela']; ?>;
                pnbp_panggilan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_panggilan_sela']; ?>;
                pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_putusan_pembanding_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_putusan_terbanding_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_pencabutan = (pemberitahuan_kontra.length) * <?= $referensi['pencabutan']; ?>;
                pnbp_pemberitahuan_pencabutan = (pemberitahuan_pernyataan.length + pemberitahuan_kontra.length) * <?= $referensi['relas_pemberitahuan_pencabutan']; ?>;


                grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_banding + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_memori + sum_penyerahan_kontra + sum_inzage_pembanding + sum_inzage_terbanding + sum_putusan_pembanding + sum_putusan_terbanding + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_memori_kontra + pnbp_inzage + pnbp_putusan + biaya_kirim;
                console.log(grand_total);



                grand_total_ecourt = pendaftaran + pnbp_penyerahan_akta + biaya_banding + pnbp_pencabutan + redaksi + pnbp_kuasa_ecourt + pnbp_pemberitahuan_pernyataan_ecourt + pnbp_penyerahan_memori_ecourt + pnbp_penyerahan_memori_kontra_ecourt + (pnbp_inzage * 2) + pnbp_putusan_sela + pnbp_panggilan_sela + pnbp_putusan_pembanding_ecourt + pnbp_putusan_terbanding_ecourt + pnbp_pemberitahuan_pencabutan;


              }
            });

          });

          $('#penggugat').on('click', '.delete-btn', function(e) {
            e.preventDefault();

            let urutan = $(this).parent().find('.urutan-penggugat').html();
            console.log(urutan);
            pemberitahuan_kontra = pemberitahuan_kontra.filter(item => item.id_penggugat != urutan);

            // Relas
            sum_penyerahan_kontra = sum_inzage_pembanding = sum_putusan_sela_pembanding = sum_panggilan_sela = sum_putusan_sela_pembanding = sum_putusan_pembanding = pemberitahuan_kontra.map(index => index.nilai).reduce((prev, current) => prev + current, 0);

            // PNBP
            pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
            pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
            pnbp_pemberitahuan_pernyataan_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
            pnbp_penyerahan_memori_kontra = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_penyerahan_memori_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_penyerahan_memori_kontra_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_inzage = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_inzage']; ?>;

            pnbp_putusan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan_sela']; ?>;
            pnbp_panggilan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_panggilan_sela']; ?>;
            pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_putusan_pembanding_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_putusan_terbanding_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_pencabutan = (pemberitahuan_kontra.length) * <?= $referensi['pencabutan']; ?>;
            pnbp_pemberitahuan_pencabutan = (pemberitahuan_pernyataan.length + pemberitahuan_kontra.length) * <?= $referensi['relas_pemberitahuan_pencabutan']; ?>;



            grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_banding + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_memori + sum_penyerahan_kontra + sum_inzage_pembanding + sum_inzage_terbanding + sum_putusan_pembanding + sum_putusan_terbanding + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_memori_kontra + pnbp_inzage + pnbp_putusan + biaya_kirim;
            console.log(grand_total);



            grand_total_ecourt = pendaftaran + pnbp_penyerahan_akta + biaya_banding + pnbp_pencabutan + redaksi + pnbp_kuasa_ecourt + pnbp_pemberitahuan_pernyataan_ecourt + pnbp_penyerahan_memori_ecourt + pnbp_penyerahan_memori_kontra_ecourt + (pnbp_inzage * 2) + pnbp_putusan_sela + pnbp_panggilan_sela + pnbp_putusan_pembanding_ecourt + pnbp_putusan_terbanding_ecourt + pnbp_pemberitahuan_pencabutan;



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
                this_element.parent().siblings().find('.kelurahan-select').append(`<option disabled selected>Pilih Kecamatan</option>`);
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
                sum_pemberitahuan_pernyataan = sum_penyerahan_memori = sum_inzage_terbanding = sum_putusan_sela_terbanding = sum_putusan_terbanding = sum_pemberitahuan_pencabutan = pemberitahuan_pernyataan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


                // PNBP
                pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
                pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
                pnbp_pemberitahuan_pernyataan_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
                pnbp_penyerahan_memori_kontra = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_penyerahan_memori_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_penyerahan_memori_kontra_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
                pnbp_inzage = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_inzage']; ?>;

                pnbp_putusan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan_sela']; ?>;
                pnbp_panggilan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_panggilan_sela']; ?>;
                pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_putusan_pembanding_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_putusan_terbanding_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
                pnbp_pencabutan = (pemberitahuan_kontra.length) * <?= $referensi['pencabutan']; ?>;
                pnbp_pemberitahuan_pencabutan = (pemberitahuan_pernyataan.length + pemberitahuan_kontra.length) * <?= $referensi['relas_pemberitahuan_pencabutan']; ?>;



                grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_banding + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_memori + sum_penyerahan_kontra + sum_inzage_pembanding + sum_inzage_terbanding + sum_putusan_pembanding + sum_putusan_terbanding + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_memori_kontra + pnbp_inzage + pnbp_putusan + biaya_kirim;
                console.log(grand_total);



                grand_total_ecourt = pendaftaran + pnbp_penyerahan_akta + biaya_banding + pnbp_pencabutan + redaksi + pnbp_kuasa_ecourt + pnbp_pemberitahuan_pernyataan_ecourt + pnbp_penyerahan_memori_ecourt + pnbp_penyerahan_memori_kontra_ecourt + (pnbp_inzage * 2) + pnbp_putusan_sela + pnbp_panggilan_sela + pnbp_putusan_pembanding_ecourt + pnbp_putusan_terbanding_ecourt + pnbp_pemberitahuan_pencabutan;

              }
            });

          });

          $('#tergugat').on('click', '.delete-btn', function(e) {
            e.preventDefault();

            let urutan = $(this).parent().find('.urutan').html();
            console.log(urutan);
            console.log(pemberitahuan_pernyataan);
            pemberitahuan_pernyataan = pemberitahuan_pernyataan.filter(item => item.id_tergugat != urutan);
            console.log(pemberitahuan_pernyataan)

            sum_pemberitahuan_pernyataan = sum_penyerahan_memori = sum_inzage_terbanding = sum_putusan_sela_terbanding = sum_putusan_terbanding = sum_pemberitahuan_pencabutan = pemberitahuan_pernyataan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


            // PNBP
            pnbp_penyerahan_akta = (pemberitahuan_kontra.length) * <?= $referensi['penyerahan_akta']; ?>;
            pnbp_pemberitahuan_pernyataan = (pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
            pnbp_pemberitahuan_pernyataan_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_pemberitahuan_pernyataan']; ?>;
            pnbp_penyerahan_memori_kontra = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_penyerahan_memori_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_penyerahan_memori_kontra_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_penyerahan_memori_kontra']; ?>;
            pnbp_inzage = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_inzage']; ?>;

            pnbp_putusan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan_sela']; ?>;
            pnbp_panggilan_sela = (pemberitahuan_kontra.length) * <?= $referensi['relas_panggilan_sela']; ?>;
            pnbp_putusan = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_putusan_pembanding_ecourt = (pemberitahuan_kontra.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_putusan_terbanding_ecourt = (pemberitahuan_kontra.length + pemberitahuan_pernyataan.length) * <?= $referensi['relas_putusan']; ?>;
            pnbp_pencabutan = (pemberitahuan_kontra.length) * <?= $referensi['pencabutan']; ?>;
            pnbp_pemberitahuan_pencabutan = (pemberitahuan_pernyataan.length + pemberitahuan_kontra.length) * <?= $referensi['relas_pemberitahuan_pencabutan']; ?>;



            grand_total = pendaftaran + pnbp_penyerahan_akta + biaya_banding + redaksi + sum_pemberitahuan_pernyataan + sum_penyerahan_memori + sum_penyerahan_kontra + sum_inzage_pembanding + sum_inzage_terbanding + sum_putusan_pembanding + sum_putusan_terbanding + pnbp_pemberitahuan_pernyataan + pnbp_penyerahan_memori_kontra + pnbp_inzage + pnbp_putusan + biaya_kirim;
            console.log(grand_total);



            grand_total_ecourt = pendaftaran + pnbp_penyerahan_akta + biaya_banding + pnbp_pencabutan + redaksi + pnbp_kuasa_ecourt + pnbp_pemberitahuan_pernyataan_ecourt + pnbp_penyerahan_memori_ecourt + pnbp_penyerahan_memori_kontra_ecourt + (pnbp_inzage * 2) + pnbp_putusan_sela + pnbp_panggilan_sela + pnbp_putusan_pembanding_ecourt + pnbp_putusan_terbanding_ecourt + pnbp_pemberitahuan_pencabutan;

            $(this).parent().parent().remove();


          })

          $('.skum-wrapper').on('click', '.hitung-skum', function(e) {
            e.preventDefault();

            let button = $(this);
            $.ajax({
              type: "post",
              url: "<?= base_url('skum/user_skum_banding'); ?>",
              data: {

                pendaftaran,
                pnbp_penyerahan_akta,
                biaya_banding,
                redaksi,
                sum_pemberitahuan_pernyataan,
                sum_penyerahan_memori,
                sum_penyerahan_kontra,
                sum_inzage_pembanding,
                sum_inzage_terbanding,
                sum_putusan_pembanding,
                sum_putusan_terbanding,
                pnbp_pemberitahuan_pernyataan,
                pnbp_pemberitahuan_pernyataan_ecourt,
                pnbp_penyerahan_memori_kontra,
                pnbp_penyerahan_memori_ecourt,
                pnbp_penyerahan_memori_kontra_ecourt,
                pnbp_inzage,
                pnbp_putusan,
                pnbp_putusan_pembanding_ecourt,
                pnbp_putusan_terbanding_ecourt,
                biaya_kirim,
                pnbp_kuasa_ecourt,
                pnbp_putusan_sela,
                pnbp_panggilan_sela,
                pnbp_pencabutan,
                pnbp_pemberitahuan_pencabutan,
                grand_total,
                grand_total_ecourt,


              },
              dataType: "json",
              beforeSend: function() {
                button.attr('disabled', true);
                button.html('<i class="fa fa-spinner fa-spin"></i>');

              },
              success: function(response) {
                console.log(response)

                $('#modal-skum').html(response);
                $('#modal-skum-banding').modal('show');
                button.removeAttr('disabled');
                button.html('Hitung SKUM');


              }
            });

          })


        })
      </script>
</section><!-- End About Section -->

<?= $this->endSection(); ?>