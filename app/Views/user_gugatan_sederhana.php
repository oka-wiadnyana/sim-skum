<?= $this->extend('layout-user/main'); ?>
<?= $this->section('main-content'); ?>
<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container">

    <div class="row justify-content-center skum-wrapper">
      <div class="col-lg-11">
        <div class="row pt-5 pb-5 ">
          <div class="col text-center">
            <h3>Simulasi Biaya Perkara Gugatan Sederhana</h3>
          </div>
          <fieldset>
            <div class="row mb-2">
              <div class="col">
                <a href="" class="btn btn-success" id="tambah-penggugat"><i class="fa fa-plus"></i> Tambah Penggugat</a>

                <button class="btn btn-primary next" id="next"></i>Next</button>
              </div>
            </div>
            <div id="penggugat" class="mt-2">
              <div>
                <div>
                  Penggugat <span class="urutan-penggugat">1</span>
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
                <a href="" class="btn btn-danger" id="tambah-uraian"><i class="fa fa-plus"></i> Tambah Tergugat</a>

                <button href="" class="btn btn-secondary previous" id="previous"></i>Prev</button>
                <button href="" class="btn btn-warning hitung-skum" id="hitung-skum"></i>Hitung SKUM</button>
              </div>
            </div>
            <div id="tergugat" class="mt-2">
              <div>
                <div>

                  Tergugat <span class="urutan">1</span>
                </div>
                <div class="form-group" id=''>
                  <label for="">Pilih status Tergugat</label>
                  <select name="" id="" class="form-control status-select">
                    <option selected disabled>Pilih..</option>
                    <option value="1">Diketahui</option>
                    <option value="2">Tidak Diketahui</option>
                  </select>
                </div>
                <div class="diketahui">
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

            </div>


          </fieldset>
        </div>
      </div>
    </div>

  </div>

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

      $('.part-2').hide();
      $('.diketahui').hide();
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

        Penggugat <span class="urutan-penggugat">${nomor}</span>
        <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

      </div>
      <div class="form-group" id='urutan-${nomor}'>
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

       Tergugat <span class="urutan">${nomor}</span>
       <a href="" class="btn btn-danger delete-btn"></i>Hapus</a>

     </div>
     <div class="form-group" id=''>
           <label for="">Pilih status Tergugat</label>
           <select name="" id="" class="form-control status-select">
             <option selected disabled>Pilih..</option>
             <option value="1">Diketahui</option>
             <option value="2">Tidak Diketahui</option>
          </select>
     </div>
     <div class="diketahui">
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
     </div>  
   </div>`)

        start_provinsi('tergugat', nomor)
        $(`#urutan-t-${nomor}`).parent().hide();

      })

      let biaya_panggilan_penggugat = [];
      let sum_panggilan_penggugat = 0;
      let sum_panggilan_tergugat = 0;
      let sum_putusan_penggugat = 0;
      let sum_putusan_tergugat = 0;
      let pnbp_panggilan = 0;
      let grand_total = 0;
      let grand_total_ecourt = 0;


      let pnbp_putusan = 0;
      let biaya_panggilan = [];

      $('#tergugat').on('change', '.status-select', function(e) {
        let element = $(this);
        if (element.val() == 1) {
          element.parent().siblings('.diketahui').show();
          let urutan = $(this).parent().siblings().find('.urutan').html();
          biaya_panggilan = biaya_panggilan.filter(item => item.id_tergugat != urutan);
          console.log(biaya_panggilan);
          sum_panggilan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 2;
          sum_putusan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


          pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
          pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

          grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
          grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

        } else {

          element.parent().siblings('.diketahui').hide();
          let panggilan_tidak_diketahui = <?= $referensi['panggilan_tidak_diketahui']; ?>;
          let urutan = $(this).parent().siblings().find('.urutan').html();
          console.log(urutan);
          biaya_panggilan = biaya_panggilan.filter(item => item.id_tergugat != urutan);
          biaya_panggilan.push({
            'id_tergugat': parseInt(urutan),
            'nilai': panggilan_tidak_diketahui
          });
          // consol.log(biaya_panggilan)
          sum_panggilan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 2;
          sum_putusan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);


          pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
          pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

          grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
          grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

        }
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
        })
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

        })
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
            kecamatan: kecamatan_penggugat,
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
            sum_panggilan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 1;

            sum_putusan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0);
            pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
            pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

            grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
            grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

          }
        });

      });

      $('#penggugat').on('click', '.delete-btn', function(e) {
        e.preventDefault();

        let urutan = $(this).parent().find('.urutan-penggugat').html();
        console.log(urutan);
        biaya_panggilan_penggugat = biaya_panggilan_penggugat.filter(item => item.id_penggugat != urutan);
        sum_panggilan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 1;

        sum_putusan_penggugat = biaya_panggilan_penggugat.map(index => index.nilai).reduce((prev, current) => prev + current, 0);
        pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
        pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

        grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
        grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

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


      $('#tergugat').on('change', '.kelurahan-select', function(e) {
        e.preventDefault();
        let val = $(this).val();
        console.log(val);
        let urutan = $(this).parent().parent().siblings().find('.urutan').html();
        console.log(urutan);
        biaya_panggilan = biaya_panggilan.filter(item => item.id_tergugat != urutan);


        $.ajax({
          type: "post",
          data: {
            kecamatan: kecamatan_tergugat,
            kelurahan: val,
          },
          url: "<?= base_url('simulasi/biaya_panggilan'); ?>",

          dataType: "json",
          success: function(response) {
            biaya_panggilan.push({
              'id_tergugat': parseInt(urutan),
              'nilai': parseInt(response)
            });
            console.log(response)
            console.log(biaya_panggilan);
            sum_panggilan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 2;
            sum_putusan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);
            pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
            pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

            grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
            grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

          }
        });

      });

      $('#tergugat').on('click', '.delete-btn', function(e) {
        e.preventDefault();

        let urutan = $(this).parent().find('.urutan').html();
        console.log(urutan);
        biaya_panggilan = biaya_panggilan.filter(item => item.id_tergugat != urutan);
        sum_panggilan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0) * 2;
        sum_putusan_tergugat = biaya_panggilan.map(index => index.nilai).reduce((prev, current) => prev + current, 0);
        pnbp_panggilan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_panggilan']; ?>;
        pnbp_putusan = (biaya_panggilan_penggugat.length + biaya_panggilan.length) * <?= $referensi['pnbp_putusan']; ?>;

        grand_total = atk + pendaftaran + sum_panggilan_penggugat + sum_panggilan_tergugat + sum_putusan_penggugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah;
        grand_total_ecourt = atk + pendaftaran + sum_panggilan_tergugat + sum_putusan_tergugat + pnbp_panggilan + pnbp_putusan + materai + redaksi + sumpah + pnbp_kuasa_ecourt;

        $(this).parent().parent().remove();


      })

      $('.skum-wrapper').on('click', '.hitung-skum', function(e) {
        e.preventDefault();
        let button = $(this);
        $.ajax({
          type: "post",
          url: "<?= base_url('skum/user_skum_gs'); ?>",
          data: {
            atk,
            pendaftaran,
            redaksi,
            materai,
            pnbp_panggilan,
            pnbp_putusan,
            sumpah,
            sum_panggilan_penggugat,
            sum_panggilan_tergugat,
            sum_putusan_penggugat,
            sum_putusan_tergugat,
            pnbp_kuasa_ecourt,
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
            $('#modal-skum-gugatan').modal('show');
            button.removeAttr('disabled');
            button.html('Hitung SKUM');
            //   $(location).attr('href', '<?= base_url('skum/v_main_skum'); ?>')


          }
        });

      })



    })
  </script>
</section><!-- End About Section -->

<?= $this->endSection(); ?>