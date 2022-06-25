<div class="modal fade" id="modal-skum-gugatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Gugatan Sederhana</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Detail Panjar Perkara Non E-Court
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="col-8">Biaya ATK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 atk"><?= number_format($atk, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Pendaftaran</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pendaftaran" id=""><?= number_format($pendaftaran, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Panggilan Penguggat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 panggilan-penggugat" id=''><?= number_format($panggilan_penggugat, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Panggilan Tergugat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 panggilan-tergugat" id=''><?= number_format($panggilan_tergugat, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Penguggat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-penggugat" id=''><?= number_format($pemb_putusan_penggugat, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Tergugat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-tergugat" id=''><?= number_format($pemb_putusan_tergugat, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Panggilan Pertama</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-panggilan" id=''><?= number_format($pnbp_panggilan_pertama, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Putusan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan" id=''><?= number_format($pnbp_pemberitahuan_putusan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Sumpah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 sumpah" id=''><?= number_format($sumpah, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Materai</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 materai" id=''><?= number_format($materai, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Redaksi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 redaksi" id=''><?= number_format($redaksi, 0, ',', '.'); ?></div>
                                </div>
                                <hr>
                                <div class="d-flex">
                                    <div class="col-8">Jumlah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3" id='jumlah-non-ecourt'><?= number_format($jumlah, 0, ',', '.'); ?></div>
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
                                    <div class="col-3 atk"><?= number_format($atk, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Pendaftaran</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pendaftaran" id=""><?= number_format($pendaftaran, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Panggilan Tergugat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 panggilan-tergugat" id=''><?= number_format($panggilan_tergugat, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Tergugat</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-tergugat" id=''><?= number_format($pemb_putusan_tergugat, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Panggilan Pertama</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-panggilan" id=''><?= number_format($pnbp_panggilan_pertama, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Putusan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan" id=''><?= number_format($pnbp_pemberitahuan_putusan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Sumpah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 sumpah" id=''><?= number_format($sumpah, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Materai</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 materai" id=''><?= number_format($materai, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Redaksi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 redaksi" id=''><?= number_format($redaksi, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Surat Kuasa</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 redaksi" id=''><?= number_format($kuasa, 0, ',', '.'); ?></div>
                                </div>
                                <hr>
                                <div class="d-flex">
                                    <div class="col-8">Jumlah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3" id='jumlah-ecourt'><?= number_format($jumlah_ecourt, 0, ',', '.'); ?></div>

                                </div>


                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>