<div class="modal" tabindex="-1" role="dialog" id="modal-akun">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Tambah Akun
                            </div>
                            <div class="card-body">
                                <form action="<?= base_url('auth/attempt_register'); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan nama" name="nama">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan email" name="email">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan password" name="password">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Konfrimasi Password</label>
                                        <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Konfrimasi Password" name="password2">

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