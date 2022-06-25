<div class="modal" tabindex="-1" role="dialog" id="modal-edit-kasir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Kasir</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Edit Kasir
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('skum/update_kasir'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['nama']; ?>" name="nama">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">NIP</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $data['nip']; ?>" name="nip">

                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                                <hr>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>