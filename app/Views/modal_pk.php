<div class="modal fade" id="modal-skum-pk" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Peninjauan Kembali</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row d-flex justify-content-center">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">
                                Detail Panjar Perkara
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="col-8">Pendaftaran</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pendaftaran"><?= number_format($pendaftaran, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Penyerahan Akta PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-akta" id=""><?= number_format($pnbp_penyerahan_akta, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Pernyataan PK dan Alasan PM</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pemberitahuan-pk" id=''><?= number_format($sum_pemberitahuan_pernyataan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Pernyataan PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-pemberitahuan-pk" id=''><?= number_format($pnbp_pemberitahuan_pernyataan, 0, ',', '.'); ?></div>
                                </div>


                                <div class="d-flex">
                                    <div class="col-8">Penyerahan Jawaban PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-kontra" id=''><?= number_format($sum_penyerahan_kontra, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Penyerahan Jawaban PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-penyerahan-kontra" id=''><?= number_format($pnbp_penyerahan_kontra, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Biaya PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 biaya-pk" id=''><?= number_format($biaya_pk, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Pemohon PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-pemohon" id=''><?= number_format($sum_putusan_pemohon, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Termohon PK</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-termohon" id=''><?= number_format($sum_putusan_termohon, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Putusan </div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan" id=''><?= number_format($pnbp_putusan, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Redaksi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 redaksi" id=''><?= number_format($redaksi, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Penyumpahan Novum</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-novum" id=''><?= number_format($novum, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Pengiriman</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pengiriman_berkas" id=''><?= number_format($biaya_kirim, 0, ',', '.'); ?></div>
                                </div>

                                <hr>
                                <div class="d-flex">
                                    <div class="col-8">Jumlah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3" id='jumlah-non-ecourt'><?= number_format($grand_total, 0, ',', '.'); ?></div>
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