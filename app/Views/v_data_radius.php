<?= $this->extend('layout/main'); ?>

<?= $this->section('content'); ?>
<div>
    <div class="row d-flex flex-column justify-content-center radius_data">
        <div class="form-group">
            <button class="btn btn-primary" id="update-radius">Perbarui Radius</button>
            <small class="explain">Harap bersabar, karena update data membutuhkan waktu agak lama</small>
        </div>
        <div class="form-group">
            <label for="">Satuan Kerja</label>
            <select name="" id="" class="form-control propinsi-select"></select>
        </div>

        <table id="table_radius" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Satker</th>
                    <th>Propinsi</th>
                    <th>Kab/Kota</th>
                    <th>Kecamatan</th>
                    <th>Kel/Desa</th>
                    <th>Radius</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>

            </tbody>


        </table>

    </div>

</div>
<script>
    $(document).ready(function() {
        start_provinsi();

        // $('#table_radius').DataTable();


        function start_provinsi() {
            $.ajax({
                type: "get",
                url: "<?= base_url('simulasi/cari_satker'); ?>",
                // data: "data",
                dataType: "json",
                success: function(response) {
                    response.forEach(element => {
                        $('.propinsi-select').append(`<option value='${element.id}'>${element.text}</option>`);
                    });
                    // $('.propinsi-select').trigger('change');
                    console.log(response)
                }
            });
        }

        $('.radius_data').on('change', '.propinsi-select', function(e) {
            // let this_element = $(this);
            e.preventDefault();
            let val = $(this).val();
            // console.log(val);
            // console.log(this_element);

            // $(this).parent().siblings().find('.kota-select').removeAttr('disabled');
            // $(this).parent().siblings().find('.kota-select option').remove();
            // $(this).parent().siblings().find('.kecamatan-select option').remove();
            // $(this).parent().siblings().find('.kelurahan-select option').remove();
            $.ajax({
                type: "post",
                data: {
                    satker_code: val,
                },
                url: "<?= base_url('simulasi/data_radius_satker'); ?>",

                dataType: "json",
                success: function(response) {
                    $('#table_radius').DataTable().clear().destroy();

                    $('tbody').html('')
                    response.forEach(element => {
                        $('tbody').append(
                            `<tr>
                                <td>${element.satker}</td>
                                <td>${element.propinsi}</td>
                                <td>${element.kab}</td>
                                <td>${element.kec}</td>
                                <td>${element.kel}</td>
                                <td>${element.radius}</td>
                                <td>${element.nilai}</td>
                            </tr>`
                        )
                        // this_element.parent().siblings().find('.kota-select').append(`<option>${element.kota}</option>`);

                    });
                    //Destroy the old Datatable

                    $('#table_radius').DataTable();

                    console.log(response)
                }
            })
        })

        $('.explain').hide();

        $('#update-radius').click(e => {
            e.preventDefault();
            let button = $(e.target);
            console.log(button)
            $.ajax({
                type: "get",
                url: "<?= base_url('radius'); ?>",
                // data: "data",
                dataType: "json",
                beforeSend: function() {
                    button.attr('disabled', true);
                    button.html('<i class="fa fa-spinner fa-spin"></i>')
                    $('.explain').show();
                },
                success: function(response) {
                    $('.explain').hide();
                    if (response.msg == 'success') {
                        Swal.fire({
                            icon: 'success',
                            text: 'Data berhasil diupdate'
                        })
                        button.removeAttr('disabled');
                        button.html('Perbarui Radius')
                    } else {
                        Swal.fire({
                            icon: 'error',
                            text: 'Data gagal diperbarui'

                        })
                        button.removeAttr('disabled');
                        button.html('Perbarui Radius')
                    }

                }
            });
        })
    })
</script>

<?= $this->endSection(); ?>