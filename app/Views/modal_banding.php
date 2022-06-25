<div class="modal fade" id="modal-skum-banding" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banding</h5>
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
                                    <div class="col-8">Pendaftaran</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pendaftaran"><?= number_format($pendaftaran, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Penyerahan Akta Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-akta" id=""><?= number_format($pnbp_penyerahan_akta, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Pernyataan Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pemberitahuan-banding" id=''><?= number_format($sum_pemberitahuan_pernyataan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Pernyataan Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-pemberitahuan-banding" id=''><?= number_format($pnbp_pemberitahuan_pernyataan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Penyerahan Memori Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-memori" id=''><?= number_format($sum_penyerahan_memori, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Penyerahan Kontra Memori Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-kontra" id=''><?= number_format($sum_penyerahan_kontra, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Penyerahan Memori dan Kontra Memori Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-penyerahan-memori-kontra" id=''><?= number_format($pnbp_penyerahan_memori_kontra, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Inzage Pembanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 inzage-pembanding" id=''><?= number_format($sum_inzage_pembanding, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Inzage Terbanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 inzage-terbanding" id=''><?= number_format($sum_inzage_terbanding, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Inzage</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-inzage" id=''><?= number_format($pnbp_inzage, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 biaya-banding" id=''><?= number_format($biaya_banding, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Pembanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-pembanding" id=''><?= number_format($sum_putusan_pembanding, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">Pemberitahuan Putusan Terbanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 putusan-terbanding" id=''><?= number_format($sum_putusan_terbanding, 0, ',', '.'); ?></div>
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
                        <div class="card mt-2">
                            <div class="card-header">
                                Biaya Panjar Perkara E-Court
                            </div>
                            <div class="card-body">


                                <div class="d-flex">
                                    <div class="col-8">Pendaftaran</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pendaftaran"><?= number_format($pendaftaran, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Penyerahan Akta Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 penyerahan-akta" id=""><?= number_format($pnbp_penyerahan_akta, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Pernyataan Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-pemberitahuan-banding" id=''><?= number_format($pnbp_pemberitahuan_pernyataan_ecourt, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Penyerahan Memori Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-penyerahan-memori-kontra" id=''><?= number_format($pnbp_penyerahan_memori_ecourt, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Penyerahan Kontra Memori Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-penyerahan-memori-kontra" id=''><?= number_format($pnbp_penyerahan_memori_kontra_ecourt, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Inzage Pembanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-inzage" id=''><?= number_format($pnbp_inzage, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Inzage Terbanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-inzage" id=''><?= number_format($pnbp_inzage, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Biaya Banding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 biaya-banding" id=''><?= number_format($biaya_banding, 0, ',', '.'); ?></div>
                                </div>


                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Pemberitahuan Putusan Sela</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan-sela" id=''><?= number_format($pnbp_putusan_sela, 0, ',', '.'); ?></div>
                                </div>


                                <div class="d-flex">
                                    <div class="col-8">PNBP Relas Panggilan atas Putusan Sela Pembanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-panggilan-sela" id=''><?= number_format($pnbp_panggilan_sela, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Putusan Pembanding </div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan" id=''><?= number_format($pnbp_putusan_pembanding_ecourt, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Putusan Terbanding</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-putusan" id=''><?= number_format($pnbp_putusan_terbanding_ecourt, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">PNBP Pencabutan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-pencabutan" id=''><?= number_format($pnbp_pencabutan, 0, ',', '.'); ?></div>
                                </div>

                                <div class="d-flex">
                                    <div class="col-8">PNBP Pemberitahuan Pencabutan</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-pemberitahuan-pencabutan" id=''><?= number_format($pnbp_pemberitahuan_pencabutan, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Redaksi</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 redaksi" id=''><?= number_format($redaksi, 0, ',', '.'); ?></div>
                                </div>
                                <div class="d-flex">
                                    <div class="col-8">Surat Kuasa</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3 pnbp-kuasa_ecourt" id=''><?= number_format($pnbp_kuasa_ecourt, 0, ',', '.'); ?></div>
                                </div>

                                <hr>
                                <div class="d-flex">
                                    <div class="col-8">Jumlah</div>
                                    <div class="col-1">:</div>
                                    <div class="col-3" id='jumlah-ecourt'><?= number_format($grand_total_ecourt, 0, ',', '.'); ?></div>
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