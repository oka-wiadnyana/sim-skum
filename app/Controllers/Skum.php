<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Ngekoding\CodeIgniterDataTables\DataTables;
use PhpOffice\PhpWord\TemplateProcessor;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelLow;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;

class Skum extends BaseController
{
    public function index()
    {
    }

    public function insert_skum()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_penggugat = $this->request->getVar('sum_panggilan_penggugat');
        $sum_panggilan_tergugat = $this->request->getVar('sum_panggilan_tergugat');
        $sum_putusan_penggugat = $this->request->getVar('sum_putusan_penggugat');
        $sum_putusan_tergugat = $this->request->getVar('sum_putusan_tergugat');
        $grand_total = $this->request->getVar('grand_total');
        $tanggal = $this->request->getVar('tanggal');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUM-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[1] + 1;
                $nomor_baru = 'SKUM-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUM-001-' . $tahun;
            }
        }



        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_penggugat' => $sum_panggilan_penggugat,
            'panggilan_tergugat' => $sum_panggilan_tergugat,
            'pemb_putusan_penggugat' => $sum_putusan_penggugat,
            'pemb_putusan_tergugat' => $sum_putusan_tergugat,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function insert_skum_gs()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_penggugat = $this->request->getVar('sum_panggilan_penggugat');
        $sum_panggilan_tergugat = $this->request->getVar('sum_panggilan_tergugat');
        $sum_putusan_penggugat = $this->request->getVar('sum_putusan_penggugat');
        $sum_putusan_tergugat = $this->request->getVar('sum_putusan_tergugat');
        $grand_total = $this->request->getVar('grand_total');
        $tanggal = $this->request->getVar('tanggal');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUMGS-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum_gs')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[1] + 1;
                $nomor_baru = 'SKUMGS-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUMGS-001-' . $tahun;
            }
        }



        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_penggugat' => $sum_panggilan_penggugat,
            'panggilan_tergugat' => $sum_panggilan_tergugat,
            'pemb_putusan_penggugat' => $sum_putusan_penggugat,
            'pemb_putusan_tergugat' => $sum_putusan_tergugat,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum_gs')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function insert_skum_permohonan()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_pemohon = $this->request->getVar('sum_panggilan_penggugat');

        $sum_putusan_pemohon = $this->request->getVar('sum_putusan_penggugat');

        $grand_total = $this->request->getVar('grand_total');
        // $tanggal = $this->request->getVar('tanggal');
        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUMP-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum_permohonan')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[1] + 1;
                $nomor_baru = 'SKUMP-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUMP-001-' . $tahun;
            }
        }


        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_pemohon' => $sum_panggilan_pemohon,
            'pemb_putusan' => $sum_putusan_pemohon,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum_permohonan')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function insert_skum_banding()
    {

        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_banding = $this->request->getVar('biaya_banding');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');
        $sum_penyerahan_memori = $this->request->getVar('sum_penyerahan_memori');
        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');
        $sum_inzage_pembanding = $this->request->getVar('sum_inzage_pembanding');
        $sum_inzage_terbanding = $this->request->getVar('sum_inzage_terbanding');
        $sum_putusan_pembanding = $this->request->getVar('sum_putusan_pembanding');
        $sum_putusan_terbanding = $this->request->getVar('sum_putusan_terbanding');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');
        $pnbp_penyerahan_memori_kontra = $this->request->getVar('pnbp_penyerahan_memori_kontra');
        $pnbp_inzage = $this->request->getVar('pnbp_inzage');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $biaya_kirim = $this->request->getVar('biaya_kirim');
        $grand_total = $this->request->getVar('grand_total');

        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUM-BND-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum_banding')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[2] + 1;
                $nomor_baru = 'SKUM-BND-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUM-BND-001-' . $tahun;
            }
        }


        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_banding' => $biaya_banding,
            'redaksi' => $redaksi,
            'pemberitahuan_banding' => $sum_pemberitahuan_pernyataan,
            'penyerahan_memori' => $sum_penyerahan_memori,
            'penyerahan_kontra' => $sum_penyerahan_kontra,
            'pemberitahuan_inzage_pembanding' => $sum_inzage_pembanding,
            'pemberitahuan_inzage_terbanding' => $sum_inzage_terbanding,
            'pemberitahuan_putusan_pembanding' => $sum_putusan_pembanding,
            'pemberitahuan_putusan_terbanding' => $sum_putusan_terbanding,
            'pnbp_pemberitahuan_banding' => $pnbp_pemberitahuan_pernyataan,
            'pnbp_penyerahan_memori_kontra' => $pnbp_penyerahan_memori_kontra,
            'pnbp_inzage' => $pnbp_inzage,
            'pnbp_putusan' => $pnbp_putusan,
            'pengiriman_berkas' => $biaya_kirim,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum_banding')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function insert_skum_kasasi()
    {

        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_kasasi = $this->request->getVar('biaya_kasasi');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');
        $sum_penyerahan_memori = $this->request->getVar('sum_penyerahan_memori');
        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');

        $sum_putusan_pemohon = $this->request->getVar('sum_putusan_pemohon');
        $sum_putusan_termohon = $this->request->getVar('sum_putusan_termohon');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');
        $pnbp_penyerahan_memori_kontra = $this->request->getVar('pnbp_penyerahan_memori_kontra');

        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $biaya_kirim = $this->request->getVar('biaya_kirim');
        $grand_total = $this->request->getVar('grand_total');

        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUM-KAS-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum_kasasi')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[2] + 1;
                $nomor_baru = 'SKUM-KAS-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUM-KAS-001-' . $tahun;
            }
        }


        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_kasasi' => $biaya_kasasi,
            'redaksi' => $redaksi,
            'pemberitahuan_kasasi' => $sum_pemberitahuan_pernyataan,
            'penyerahan_memori' => $sum_penyerahan_memori,
            'penyerahan_kontra' => $sum_penyerahan_kontra,

            'pemberitahuan_putusan_pemohon' => $sum_putusan_pemohon,
            'pemberitahuan_putusan_termohon' => $sum_putusan_termohon,
            'pnbp_pemberitahuan_kasasi' => $pnbp_pemberitahuan_pernyataan,
            'pnbp_penyerahan_memori_kontra' => $pnbp_penyerahan_memori_kontra,

            'pnbp_putusan' => $pnbp_putusan,
            'pengiriman_berkas' => $biaya_kirim,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum_kasasi')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function insert_skum_pk()
    {

        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_pk = $this->request->getVar('biaya_pk');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');

        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');

        $sum_putusan_pemohon = $this->request->getVar('sum_putusan_pemohon');
        $sum_putusan_termohon = $this->request->getVar('sum_putusan_termohon');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');
        $pnbp_penyerahan_kontra = $this->request->getVar('pnbp_penyerahan_kontra');

        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $biaya_kirim = $this->request->getVar('biaya_kirim');
        $novum = $this->request->getVar('novum');
        $grand_total = $this->request->getVar('grand_total');

        $nama = $this->request->getVar('nama');
        $alamat = $this->request->getVar('alamat');
        $telepon = $this->request->getVar('telepon');
        $tanggal_skum = $this->request->getVar('tanggal_skum');
        $nomor_manual = $this->request->getVar('nomor_manual');
        $tahun_manual = $this->request->getVar('tahun_manual');

        if (!empty($tahun_manual) && !empty($nomor_manual)) {
            $nomor_baru = 'SKUM-PK-' . sprintf('%03s', $nomor_manual) . '-' . $tahun_manual;
            $db = db_connect();
        } else {
            $tahun = date('Y');
            $db = db_connect();
            $nomor_max = $db->table('main_skum_pk')->selectMax('nomor_skum')->where('YEAR(tanggal_skum)', $tahun)->get()->getRowArray();
            // dd($nomor_max);

            if ($nomor_max['nomor_skum'] != null || $nomor_max['nomor_skum'] != '') {
                $nomor_max = explode('-', $nomor_max['nomor_skum']);
                $nomor_max = (int)$nomor_max[2] + 1;
                $nomor_baru = 'SKUM-PK-' . sprintf('%03s', $nomor_max) . '-' . $tahun;
            } else {
                $nomor_baru = 'SKUM-PK-001-' . $tahun;
            }
        }


        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_pk' => $biaya_pk,
            'redaksi' => $redaksi,
            'pemberitahuan_pk_memori' => $sum_pemberitahuan_pernyataan,

            'penyerahan_kontra' => $sum_penyerahan_kontra,

            'pemberitahuan_putusan_pemohon' => $sum_putusan_pemohon,
            'pemberitahuan_putusan_termohon' => $sum_putusan_termohon,
            'pnbp_pemberitahuan_pk_memori' => $pnbp_pemberitahuan_pernyataan,
            'pnbp_penyerahan_kontra' => $pnbp_penyerahan_kontra,

            'pnbp_putusan' => $pnbp_putusan,
            'pengiriman_berkas' => $biaya_kirim,
            'pnbp_novum' => $novum,
            'jumlah' => $grand_total,
            'tanggal_skum' => $tanggal_skum,
            // 'tanggal_skum' => date('Y-m-d'),
            'nomor_skum' => $nomor_baru,
            'nama' => $nama,
            'alamat' => $alamat,
            'nomor_telepon' => $telepon,
        ];


        if ($db->table('main_skum_pk')->insert($data)) {
            session()->setFlashdata('success', 'SKUM berhasil disimpan');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal disimpan']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function v_main_skum()
    {
        return view('v_main_skum');
    }

    public function datatable_skum()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_gugatan/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_gugatan/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }

    public function v_main_skum_gs()
    {
        return view('v_main_skum_gs');
    }

    public function datatable_skum_gs()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum_gs')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail_gs/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_gs/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_gs/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }

    public function v_main_skum_permohonan()
    {
        return view('v_main_skum_permohonan');
    }

    public function datatable_skum_permohonan()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum_permohonan');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail_permohonan/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_permohonan/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_permohonan/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }

    public function v_main_skum_banding()
    {
        return view('v_main_skum_banding');
    }

    public function datatable_skum_banding()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum_banding')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail_banding/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_banding/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_banding/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }
    public function v_main_skum_kasasi()
    {
        return view('v_main_skum_kasasi');
    }
    public function datatable_skum_kasasi()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum_kasasi')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail_kasasi/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_kasasi/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_kasasi/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }

    public function v_main_skum_pk()
    {
        return view('v_main_skum_pk');
    }
    public function datatable_skum_pk()
    {
        $db = db_connect();
        $queryBuilder = $db->table('main_skum_pk')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nomor_skum', 'nama', 'nomor_telepon', 'jumlah']);

        $datatables->format('nomor_skum', function ($value, $row) {

            return '<a href=' . base_url('skum/detail_pk/' . $row->id) . ' target="_blank">' . $value . '</a>';
        });
        $datatables->format('jumlah', function ($value, $row) {
            helper('number');
            $rupiah = number_to_currency($value, 'IDR', 'id_ID');
            return $rupiah;
        });


        $datatables->addColumn('action', function ($row) {

            return '<a href="" class="btn btn-danger delete_btn " data-id="' . $row->id . '" data-nama="' . $row->nomor_skum . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash"></i></a>
            <a href="' . base_url('skum/cetak_skum_pk/' . $row->id) . '" class="btn btn-success cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="skum" target="_blank"><i class="fa fa-file"></i></a>

            <a href="' . base_url('skum/cetak_kwitansi_pk/' . $row->id) . '" class="btn btn-warning cetak_btn " data-id="' . $row->id . '" style="border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="kwitansi" target="_blank"><i class="fa fa-file"></i></a>
            ';
        });



        $datatables->generate(); // done
    }

    public function detail($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum', ['data' => $reformat]);
    }

    public function detail_gs($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum_gs')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum_gs', ['data' => $reformat]);
    }

    public function detail_permohonan($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum_permohonan')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum_permohonan', ['data' => $reformat]);
    }

    public function detail_banding($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum_banding')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum_banding', ['data' => $reformat]);
    }

    public function detail_kasasi($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum_kasasi')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum_kasasi', ['data' => $reformat]);
    }

    public function detail_pk($id = null)
    {

        $db = db_connect();
        $data_skum = $db->table('main_skum_pk')->where('id', $id)->get()->getRowArray();
        $reformat = [];
        helper('number');
        foreach ($data_skum as $key => $value) {
            if ($key != 'id' && $key != 'nama' && $key != 'alamat' && $key != 'nomor_telepon' && $key != 'nomor_skum') {

                $reformat[$key] =  number_to_currency((int)$value, 'IDR', 'id_ID');
            } else {
                $reformat[$key] =  $value;
            }
        }
        return view('v_detail_skum_pk', ['data' => $reformat]);
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function delete_gs()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum_gs')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function delete_permohonan()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum_permohonan')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function delete_banding()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum_banding')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }
    public function delete_kasasi()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum_kasasi')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function delete_pk()
    {
        $id = $this->request->getVar('id');
        $db = db_connect();
        if ($db->table('main_skum_pk')->where('id', $id)->delete()) {

            session()->setFlashdata('success', 'SKUM berhasil dihapus');
            return $this->response->setJSON(['msg' => 'success']);
        } else {
            session()->setFlashdata('fail', ['SKUM gagal dihapus']);
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function cetak_skum_gugatan($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create($data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);
        $templateBA->setValue('atk', number_format($data_skum['atk'], 0, ",", "."));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ",", "."));
        $templateBA->setValue('materai', number_format($data_skum['materai'], 0, ",", "."));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ",", "."));
        $templateBA->setValue('panggilan_penggugat', number_format($data_skum['panggilan_penggugat'], 0, ",", "."));
        $templateBA->setValue('panggilan_tergugat', number_format($data_skum['panggilan_tergugat'], 0, ",", "."));
        $templateBA->setValue('pemb_putusan_penggugat', number_format($data_skum['pemb_putusan_penggugat'], 0, ",", "."));
        $templateBA->setValue('pemb_putusan_tergugat', number_format($data_skum['pemb_putusan_tergugat'], 0, ",", "."));
        $templateBA->setValue('pnbp_panggilan_pertama', number_format($data_skum['pnbp_panggilan_pertama'], 0, ",", "."));
        $templateBA->setValue('pnbp_pemberitahuan_putusan', number_format($data_skum['pnbp_pemberitahuan_putusan'], 0, ",", "."));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_kwitansi_gugatan($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];
        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');



        $templateBA = new TemplateProcessor(base_url('/template/kwitansi.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_skum_gs($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_gs')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create($data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);
        $templateBA->setValue('atk', number_format($data_skum['atk'], 0, ",", "."));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ",", "."));
        $templateBA->setValue('materai', number_format($data_skum['materai'], 0, ",", "."));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ",", "."));
        $templateBA->setValue('panggilan_penggugat', number_format($data_skum['panggilan_penggugat'], 0, ",", "."));
        $templateBA->setValue('panggilan_tergugat', number_format($data_skum['panggilan_tergugat'], 0, ",", "."));
        $templateBA->setValue('pemb_putusan_penggugat', number_format($data_skum['pemb_putusan_penggugat'], 0, ",", "."));
        $templateBA->setValue('pemb_putusan_tergugat', number_format($data_skum['pemb_putusan_tergugat'], 0, ",", "."));
        $templateBA->setValue('pnbp_panggilan_pertama', number_format($data_skum['pnbp_panggilan_pertama'], 0, ",", "."));
        $templateBA->setValue('pnbp_pemberitahuan_putusan', number_format($data_skum['pnbp_pemberitahuan_putusan'], 0, ",", "."));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_kwitansi_gs($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_gs')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];
        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');



        $templateBA = new TemplateProcessor(base_url('/template/kwitansi.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_skum_permohonan($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_permohonan')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum_permohonan.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);
        $templateBA->setValue('atk', number_format($data_skum['atk'], 0, ",", "."));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ",", "."));
        $templateBA->setValue('materai', number_format($data_skum['materai'], 0, ",", "."));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ",", "."));
        $templateBA->setValue('panggilan_pemohon', number_format($data_skum['panggilan_pemohon'], 0, ",", "."));

        $templateBA->setValue('pemb_putusan_pemohon', number_format($data_skum['pemb_putusan'], 0, ",", "."));

        $templateBA->setValue('pnbp_panggilan_pertama', number_format($data_skum['pnbp_panggilan_pertama'], 0, ",", "."));
        $templateBA->setValue('pnbp_pemberitahuan_putusan', number_format($data_skum['pnbp_pemberitahuan_putusan'], 0, ",", "."));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_kwitansi_permohonan($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_permohonan')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/kwitansi_permohonan.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_skum_banding($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_banding')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];
        $writer = new PngWriter();

        $qrCode = QrCode::create($data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum_banding.docx'));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ',', '.'));
        $templateBA->setValue('pnbp_penyerahan_akta', number_format($data_skum['pnbp_penyerahan_akta'], 0, ',', '.'));
        $templateBA->setValue('pemberitahuan_banding', number_format($data_skum['pemberitahuan_banding'], 0, ',', '.'));
        $templateBA->setValue('pnbp_pemb_banding', number_format($data_skum['pnbp_pemberitahuan_banding'], 0, ',', '.'));
        $templateBA->setValue('penyerahan_memori', number_format($data_skum['penyerahan_memori'], 0, ',', '.'));
        $templateBA->setValue('penyerahan_kontra', number_format($data_skum['penyerahan_kontra'], 0, ',', '.'));
        $templateBA->setValue('pnbp_memori_kontra', number_format($data_skum['pnbp_penyerahan_memori_kontra'], 0, ',', '.'));
        $templateBA->setValue('inzage_pembanding', number_format($data_skum['pemberitahuan_inzage_pembanding'], 0, ',', '.'));
        $templateBA->setValue('inzage_terbanding', number_format($data_skum['pemberitahuan_inzage_terbanding'], 0, ',', '.'));
        $templateBA->setValue('pnbp_inzage', number_format($data_skum['pnbp_inzage'], 0, ',', '.'));
        $templateBA->setValue('putusan_pembanding', number_format($data_skum['pemberitahuan_putusan_pembanding'], 0, ',', '.'));
        $templateBA->setValue('putusan_terbanding', number_format($data_skum['pemberitahuan_putusan_terbanding'], 0, ',', '.'));
        $templateBA->setValue('pnbp_putusan', number_format($data_skum['pnbp_putusan'], 0, ',', '.'));
        $templateBA->setValue('biaya_banding', number_format($data_skum['biaya_banding'], 0, ',', '.'));
        $templateBA->setValue('pengiriman_berkas', number_format($data_skum['pengiriman_berkas'], 0, ',', '.'));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ',', '.'));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ',', '.'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);

        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_kwitansi_banding($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_banding')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/kwitansi_banding.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_skum_kasasi($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_kasasi')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];
        $writer = new PngWriter();

        $qrCode = QrCode::create($data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum_kasasi.docx'));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ',', '.'));
        $templateBA->setValue('pnbp_penyerahan_akta', number_format($data_skum['pnbp_penyerahan_akta'], 0, ',', '.'));
        $templateBA->setValue('pemberitahuan_kasasi', number_format($data_skum['pemberitahuan_kasasi'], 0, ',', '.'));
        $templateBA->setValue('pnbp_pemb_kasasi', number_format($data_skum['pnbp_pemberitahuan_kasasi'], 0, ',', '.'));
        $templateBA->setValue('penyerahan_memori', number_format($data_skum['penyerahan_memori'], 0, ',', '.'));
        $templateBA->setValue('penyerahan_kontra', number_format($data_skum['penyerahan_kontra'], 0, ',', '.'));
        $templateBA->setValue('pnbp_memori_kontra', number_format($data_skum['pnbp_penyerahan_memori_kontra'], 0, ',', '.'));

        $templateBA->setValue('putusan_pemohon', number_format($data_skum['pemberitahuan_putusan_pemohon'], 0, ',', '.'));
        $templateBA->setValue('putusan_termohon', number_format($data_skum['pemberitahuan_putusan_termohon'], 0, ',', '.'));
        $templateBA->setValue('pnbp_putusan', number_format($data_skum['pnbp_putusan'], 0, ',', '.'));
        $templateBA->setValue('biaya_kasasi', number_format($data_skum['biaya_kasasi'], 0, ',', '.'));
        $templateBA->setValue('pengiriman_berkas', number_format($data_skum['pengiriman_berkas'], 0, ',', '.'));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ',', '.'));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ',', '.'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);

        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }


    public function cetak_kwitansi_kasasi($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_kasasi')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/kwitansi_kasasi.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function cetak_skum_pk($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_pk')->where('id', $id)->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];
        $writer = new PngWriter();

        $qrCode = QrCode::create($data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/skum_pk.docx'));
        $templateBA->setValue('pendaftaran', number_format($data_skum['pendaftaran'], 0, ',', '.'));
        $templateBA->setValue('pnbp_penyerahan_akta', number_format($data_skum['pnbp_penyerahan_akta'], 0, ',', '.'));
        $templateBA->setValue('pemberitahuan_pk', number_format($data_skum['pemberitahuan_pk_memori'], 0, ',', '.'));
        $templateBA->setValue('pnbp_pemb_pk', number_format($data_skum['pnbp_pemberitahuan_pk_memori'], 0, ',', '.'));

        $templateBA->setValue('penyerahan_kontra', number_format($data_skum['penyerahan_kontra'], 0, ',', '.'));
        $templateBA->setValue('pnbp_kontra', number_format($data_skum['pnbp_penyerahan_kontra'], 0, ',', '.'));

        $templateBA->setValue('putusan_pemohon', number_format($data_skum['pemberitahuan_putusan_pemohon'], 0, ',', '.'));
        $templateBA->setValue('putusan_termohon', number_format($data_skum['pemberitahuan_putusan_termohon'], 0, ',', '.'));
        $templateBA->setValue('pnbp_putusan', number_format($data_skum['pnbp_putusan'], 0, ',', '.'));
        $templateBA->setValue('biaya_pk', number_format($data_skum['biaya_pk'], 0, ',', '.'));
        $templateBA->setValue('pengiriman_berkas', number_format($data_skum['pengiriman_berkas'], 0, ',', '.'));
        $templateBA->setValue('redaksi', number_format($data_skum['redaksi'], 0, ',', '.'));
        $templateBA->setValue('novum', number_format($data_skum['pnbp_novum'], 0, ',', '.'));
        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ',', '.'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('alamat', $data_skum['alamat']);
        $templateBA->setValue('tanggal', $tanggal_skum);
        $templateBA->setValue('nomor_telepon', $data_skum['nomor_telepon']);

        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }



    public function cetak_kwitansi_pk($id = null)
    {

        helper(['terbilang', 'idndate_helper']);

        // $id = ['9', '10'];
        // // $id = implode(',', $id);
        $db = db_connect();
        $data_skum = $db->table('main_skum_pk')->where('id', $id)->get()->getRowArray();
        $kasir = $db->table('kasir')->get()->getRowArray();

        $hari = idndate($data_skum['tanggal_skum'])['hari'];
        $tanggal_skum = idndate($data_skum['tanggal_skum'])['tanggal'];

        $writer = new PngWriter();

        $qrCode = QrCode::create('KWITANSI-SKUM/' . $data_skum['nomor_skum'] . '/' . $data_skum['jumlah'])
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelLow())
            ->setSize(300)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeMargin())
            ->setForegroundColor(new Color(0, 0, 0))
            ->setBackgroundColor(new Color(255, 255, 255));


        $result = $writer->write($qrCode);
        $result->saveToFile(ROOTPATH . 'public/qrcode/qrcode.png');


        $templateBA = new TemplateProcessor(base_url('/template/kwitansi_pk.docx'));
        $templateBA->setValue('nomor_skum', $data_skum['nomor_skum']);
        $templateBA->setValue('nama', $data_skum['nama']);
        $templateBA->setValue('tanggal', $tanggal_skum);

        $templateBA->setValue('jumlah', number_format($data_skum['jumlah'], 0, ",", "."));
        $templateBA->setValue('terbilang', terbilang($data_skum['jumlah']));
        $templateBA->setValue('kasir', $kasir['nama']);
        $templateBA->setImageValue('qr', ['path' => ROOTPATH . 'public/qrcode/qrcode.png', 'width' => 100, 'height' => 100, 'ratio' => false]);

        $this->response->setContentType('application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        $this->response->setHeader('Content-Disposition', 'attachment;filename="KWITANSI-' . $data_skum['nomor_skum'] . '-' . time() . '.docx"');
        $pathToSave = 'php://output';
        $templateBA->saveAs($pathToSave);
    }

    public function user_skum_gugatan()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_penggugat = $this->request->getVar('sum_panggilan_penggugat');
        $sum_panggilan_tergugat = $this->request->getVar('sum_panggilan_tergugat');
        $sum_putusan_penggugat = $this->request->getVar('sum_putusan_penggugat');
        $sum_putusan_tergugat = $this->request->getVar('sum_putusan_tergugat');
        $pnbp_kuasa_ecourt = $this->request->getVar('pnbp_kuasa_ecourt');
        $grand_total = $this->request->getVar('grand_total');
        $grand_total_ecourt = $this->request->getVar('grand_total_ecourt');




        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_penggugat' => $sum_panggilan_penggugat,
            'panggilan_tergugat' => $sum_panggilan_tergugat,
            'pemb_putusan_penggugat' => $sum_putusan_penggugat,
            'pemb_putusan_tergugat' => $sum_putusan_tergugat,
            'kuasa' => $pnbp_kuasa_ecourt,
            'jumlah' => $grand_total,
            'jumlah_ecourt' => $grand_total_ecourt,

        ];


        return $this->response->setJson([view('modal_gugatan', $data)]);
    }

    public function user_skum_gs()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_penggugat = $this->request->getVar('sum_panggilan_penggugat');
        $sum_panggilan_tergugat = $this->request->getVar('sum_panggilan_tergugat');
        $sum_putusan_penggugat = $this->request->getVar('sum_putusan_penggugat');
        $sum_putusan_tergugat = $this->request->getVar('sum_putusan_tergugat');
        $pnbp_kuasa_ecourt = $this->request->getVar('pnbp_kuasa_ecourt');
        $grand_total = $this->request->getVar('grand_total');
        $grand_total_ecourt = $this->request->getVar('grand_total_ecourt');




        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_penggugat' => $sum_panggilan_penggugat,
            'panggilan_tergugat' => $sum_panggilan_tergugat,
            'pemb_putusan_penggugat' => $sum_putusan_penggugat,
            'pemb_putusan_tergugat' => $sum_putusan_tergugat,
            'kuasa' => $pnbp_kuasa_ecourt,
            'jumlah' => $grand_total,
            'jumlah_ecourt' => $grand_total_ecourt,

        ];


        return $this->response->setJson([view('modal_gs', $data)]);
    }


    public function user_skum_permohonan()
    {
        $atk = $this->request->getVar('atk');
        $pendaftaran = $this->request->getVar('pendaftaran');
        $materai = $this->request->getVar('materai');
        $redaksi = $this->request->getVar('redaksi');
        $pnbp_panggilan = $this->request->getVar('pnbp_panggilan');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');

        $sumpah = $this->request->getVar('sumpah');
        $sum_panggilan_penggugat = $this->request->getVar('sum_panggilan_penggugat');

        $sum_putusan_penggugat = $this->request->getVar('sum_putusan_penggugat');

        $pnbp_kuasa_ecourt = $this->request->getVar('pnbp_kuasa_ecourt');
        $grand_total = $this->request->getVar('grand_total');
        $grand_total_ecourt = $this->request->getVar('grand_total_ecourt');




        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'pnbp_panggilan_pertama' => $pnbp_panggilan,
            'pnbp_pemberitahuan_putusan' => $pnbp_putusan,
            'sumpah' => $sumpah,
            'panggilan_penggugat' => $sum_panggilan_penggugat,

            'pemb_putusan_penggugat' => $sum_putusan_penggugat,

            'kuasa' => $pnbp_kuasa_ecourt,
            'jumlah' => $grand_total,
            'jumlah_ecourt' => $grand_total_ecourt,

        ];


        return $this->response->setJson([view('modal_permohonan', $data)]);
    }

    public function user_skum_banding()
    {
        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_banding = $this->request->getVar('biaya_banding');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');
        $sum_penyerahan_memori = $this->request->getVar('sum_penyerahan_memori');
        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');
        $sum_inzage_pembanding = $this->request->getVar('sum_inzage_pembanding');
        $sum_inzage_terbanding = $this->request->getVar('sum_inzage_terbanding');
        $sum_putusan_pembanding = $this->request->getVar('sum_putusan_pembanding');
        $sum_putusan_terbanding = $this->request->getVar('sum_putusan_terbanding');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');
        $pnbp_pemberitahuan_pernyataan_ecourt = $this->request->getVar('pnbp_pemberitahuan_pernyataan_ecourt');
        $pnbp_penyerahan_memori_kontra = $this->request->getVar('pnbp_penyerahan_memori_kontra');
        $pnbp_penyerahan_memori_ecourt = $this->request->getVar('pnbp_penyerahan_memori_ecourt');
        $pnbp_penyerahan_memori_kontra_ecourt = $this->request->getVar('pnbp_penyerahan_memori_kontra_ecourt');
        $pnbp_inzage = $this->request->getVar('pnbp_inzage');
        $pnbp_putusan = $this->request->getVar('pnbp_putusan');
        $pnbp_putusan_pembanding_ecourt = $this->request->getVar('pnbp_putusan_pembanding_ecourt');
        $pnbp_putusan_terbanding_ecourt = $this->request->getVar('pnbp_putusan_terbanding_ecourt');
        $biaya_kirim = $this->request->getVar('biaya_kirim');
        $pnbp_putusan_sela = $this->request->getVar('pnbp_putusan_sela');
        $pnbp_panggilan_sela = $this->request->getVar('pnbp_panggilan_sela');
        $pnbp_pencabutan = $this->request->getVar('pnbp_pencabutan');
        $pnbp_pemberitahuan_pencabutan = $this->request->getVar('pnbp_pemberitahuan_pencabutan');
        $pnbp_kuasa_ecourt = $this->request->getVar('pnbp_kuasa_ecourt');
        $grand_total = $this->request->getVar('grand_total');
        $grand_total_ecourt = $this->request->getVar('grand_total_ecourt');




        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_banding' => $biaya_banding,
            'redaksi' => $redaksi,
            'sum_pemberitahuan_pernyataan' => $sum_pemberitahuan_pernyataan,
            'sum_penyerahan_memori' => $sum_penyerahan_memori,
            'sum_penyerahan_kontra' => $sum_penyerahan_kontra,
            'sum_inzage_pembanding' => $sum_inzage_pembanding,
            'sum_inzage_terbanding' => $sum_inzage_terbanding,
            'sum_putusan_pembanding' => $sum_putusan_pembanding,
            'sum_putusan_terbanding' => $sum_putusan_terbanding,
            'pnbp_pemberitahuan_pernyataan' => $pnbp_pemberitahuan_pernyataan,
            'pnbp_pemberitahuan_pernyataan_ecourt' => $pnbp_pemberitahuan_pernyataan_ecourt,
            'pnbp_penyerahan_memori_kontra' => $pnbp_penyerahan_memori_kontra,
            'pnbp_penyerahan_memori_ecourt' => $pnbp_penyerahan_memori_ecourt,
            'pnbp_penyerahan_memori_kontra_ecourt' => $pnbp_penyerahan_memori_kontra_ecourt,
            'pnbp_inzage' => $pnbp_inzage,
            'pnbp_putusan' => $pnbp_putusan,
            'pnbp_putusan_pembanding_ecourt' => $pnbp_putusan_pembanding_ecourt,
            'pnbp_putusan_terbanding_ecourt' => $pnbp_putusan_terbanding_ecourt,
            'biaya_kirim' => $biaya_kirim,
            'pnbp_putusan_sela' => $pnbp_putusan_sela,
            'pnbp_panggilan_sela' => $pnbp_panggilan_sela,
            'pnbp_pencabutan' => $pnbp_pencabutan,
            'pnbp_pemberitahuan_pencabutan' => $pnbp_pemberitahuan_pencabutan,
            'pnbp_kuasa_ecourt' => $pnbp_kuasa_ecourt,
            'grand_total' => $grand_total,
            'grand_total_ecourt' => $grand_total_ecourt,

        ];


        return $this->response->setJson([view('modal_banding', $data)]);
    }

    public function user_skum_kasasi()
    {
        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_kasasi = $this->request->getVar('biaya_kasasi');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');
        $sum_penyerahan_memori = $this->request->getVar('sum_penyerahan_memori');
        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');

        $sum_putusan_pemohon = $this->request->getVar('sum_putusan_pemohon');
        $sum_putusan_termohon = $this->request->getVar('sum_putusan_termohon');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');
        ('pnbp_pemberitahuan_pernyataan_ecourt');
        $pnbp_penyerahan_memori_kontra = $this->request->getVar('pnbp_penyerahan_memori_kontra');

        $pnbp_putusan = $this->request->getVar('pnbp_putusan');

        $biaya_kirim = $this->request->getVar('biaya_kirim');

        $grand_total = $this->request->getVar('grand_total');




        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_kasasi' => $biaya_kasasi,
            'redaksi' => $redaksi,
            'sum_pemberitahuan_pernyataan' => $sum_pemberitahuan_pernyataan,
            'sum_penyerahan_memori' => $sum_penyerahan_memori,
            'sum_penyerahan_kontra' => $sum_penyerahan_kontra,

            'sum_putusan_pemohon' => $sum_putusan_pemohon,
            'sum_putusan_termohon' => $sum_putusan_termohon,
            'pnbp_pemberitahuan_pernyataan' => $pnbp_pemberitahuan_pernyataan,

            'pnbp_penyerahan_memori_kontra' => $pnbp_penyerahan_memori_kontra,

            'pnbp_putusan' => $pnbp_putusan,

            'biaya_kirim' => $biaya_kirim,

            'grand_total' => $grand_total,


        ];


        return $this->response->setJson([view('modal_kasasi', $data)]);
    }

    public function user_skum_pk()
    {
        $pendaftaran = $this->request->getVar('pendaftaran');
        $pnbp_penyerahan_akta = $this->request->getVar('pnbp_penyerahan_akta');
        $biaya_pk = $this->request->getVar('biaya_pk');
        $redaksi = $this->request->getVar('redaksi');
        $sum_pemberitahuan_pernyataan = $this->request->getVar('sum_pemberitahuan_pernyataan');
        $sum_penyerahan_memori = $this->request->getVar('sum_penyerahan_memori');
        $sum_penyerahan_kontra = $this->request->getVar('sum_penyerahan_kontra');

        $sum_putusan_pemohon = $this->request->getVar('sum_putusan_pemohon');
        $sum_putusan_termohon = $this->request->getVar('sum_putusan_termohon');
        $pnbp_pemberitahuan_pernyataan = $this->request->getVar('pnbp_pemberitahuan_pernyataan');

        $pnbp_penyerahan_kontra = $this->request->getVar('pnbp_penyerahan_kontra');

        $pnbp_putusan = $this->request->getVar('pnbp_putusan');

        $biaya_kirim = $this->request->getVar('biaya_kirim');
        $novum = $this->request->getVar('novum');

        $grand_total = $this->request->getVar('grand_total');




        $data = [

            'pendaftaran' => $pendaftaran,
            'pnbp_penyerahan_akta' => $pnbp_penyerahan_akta,
            'biaya_pk' => $biaya_pk,
            'redaksi' => $redaksi,
            'sum_pemberitahuan_pernyataan' => $sum_pemberitahuan_pernyataan,

            'sum_penyerahan_kontra' => $sum_penyerahan_kontra,

            'sum_putusan_pemohon' => $sum_putusan_pemohon,
            'sum_putusan_termohon' => $sum_putusan_termohon,
            'pnbp_pemberitahuan_pernyataan' => $pnbp_pemberitahuan_pernyataan,

            'pnbp_penyerahan_kontra' => $pnbp_penyerahan_kontra,

            'pnbp_putusan' => $pnbp_putusan,

            'biaya_kirim' => $biaya_kirim,
            'novum' => $novum,

            'grand_total' => $grand_total,


        ];


        return $this->response->setJson([view('modal_pk', $data)]);
    }

    public function biaya_gugatan()
    {
        $db = db_connect();
        $ref_biaya = $db->table('referensi_biaya')->get()->getRowArray();

        return view('ref_biaya_tk_satu', ['data' => $ref_biaya]);
    }

    public function simpan_ref_biaya_tk_satu()
    {
        $atk = str_replace('.', '', $this->request->getVar('atk'));
        $pendaftaran = str_replace('.', '', $this->request->getVar('pendaftaran'));
        $pnbp_panggilan = str_replace('.', '', $this->request->getVar('pnbp_panggilan'));
        $pnbp_putusan = str_replace('.', '', $this->request->getVar('pnbp_putusan'));
        $materai = str_replace('.', '', $this->request->getVar('materai'));
        $redaksi = str_replace('.', '', $this->request->getVar('redaksi'));
        $sumpah = str_replace('.', '', $this->request->getVar('sumpah'));
        $unknown = str_replace('.', '', $this->request->getVar('unknown'));

        $db = db_connect();

        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'pnbp_panggilan' => $pnbp_panggilan,
            'pnbp_putusan' => $pnbp_putusan,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'sumpah' => $sumpah,
            'panggilan_tidak_diketahui' => $unknown,

        ];
        if (!$db->table('referensi_biaya')->countAllResults()) {
            $db->table('referensi_biaya')->insert($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('skum/biaya_gugatan'));
        } else {
            $db->table('referensi_biaya')->update($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('skum/biaya_gugatan'));
        }
    }


    public function biaya_permohonan()
    {
        $db = db_connect();
        $ref_biaya = $db->table('referensi_biaya_permohonan')->get()->getRowArray();

        return view('ref_biaya_permohonan', ['data' => $ref_biaya]);
    }

    public function simpan_ref_biaya_permohonan()
    {
        $atk = str_replace('.', '', $this->request->getVar('atk'));
        $pendaftaran = str_replace('.', '', $this->request->getVar('pendaftaran'));
        $pnbp_panggilan = str_replace('.', '', $this->request->getVar('pnbp_panggilan'));
        $pnbp_putusan = str_replace('.', '', $this->request->getVar('pnbp_putusan'));
        $materai = str_replace('.', '', $this->request->getVar('materai'));
        $redaksi = str_replace('.', '', $this->request->getVar('redaksi'));
        $sumpah = str_replace('.', '', $this->request->getVar('sumpah'));

        $db = db_connect();

        $data = [
            'atk' => $atk,
            'pendaftaran' => $pendaftaran,
            'pnbp_panggilan' => $pnbp_panggilan,
            'pnbp_putusan' => $pnbp_putusan,
            'materai' => $materai,
            'redaksi' => $redaksi,
            'sumpah' => $sumpah,

        ];
        if (!$db->table('referensi_biaya_permohonan')->countAllResults()) {
            $db->table('referensi_biaya_permohonan')->insert($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('skum/biaya_permohonan'));
        } else {
            $db->table('referensi_biaya_permohonan')->update($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('skum/biaya_permohonan'));
        }
    }

    public function biaya_tk_banding()
    {
        $db = db_connect();
        $ref_biaya = $db->table('referensi_biaya_banding')->get()->getRowArray();

        return view('ref_biaya_tk_banding', ['data' => $ref_biaya]);
    }

    public function simpan_ref_biaya_tk_banding()
    {

        $pendaftaran = str_replace('.', '', $this->request->getVar('pendaftaran'));
        $penyerahan_akta = str_replace('.', '', $this->request->getVar('penyerahan_akta'));
        $biaya_banding = str_replace('.', '', $this->request->getVar('biaya_banding'));
        $relas_pemberitahuan_pernyataan = str_replace('.', '', $this->request->getVar('relas_pemberitahuan_pernyataan'));
        $relas_penyerahan_memori_kontra = str_replace('.', '', $this->request->getVar('relas_penyerahan_memori_kontra'));
        $relas_inzage = str_replace('.', '', $this->request->getVar('relas_inzage'));
        $relas_putusan_sela = str_replace('.', '', $this->request->getVar('relas_putusan_sela'));
        $relas_panggilan_sela = str_replace('.', '', $this->request->getVar('relas_panggilan_sela'));
        $relas_putusan = str_replace('.', '', $this->request->getVar('relas_putusan'));
        $pencabutan = str_replace('.', '', $this->request->getVar('pencabutan'));
        $relas_pemberitahuan_pencabutan = str_replace('.', '', $this->request->getVar('relas_pemberitahuan_pencabutan'));
        $redaksi = str_replace('.', '', $this->request->getVar('redaksi'));
        $pengiriman_berkas = str_replace('.', '', $this->request->getVar('pengiriman_berkas'));

        $db = db_connect();

        $data = [

            'pendaftaran' => $pendaftaran,
            'penyerahan_akta' => $penyerahan_akta,
            'biaya_banding' => $biaya_banding,
            'relas_pemberitahuan_pernyataan' => $relas_pemberitahuan_pernyataan,
            'relas_penyerahan_memori_kontra' => $relas_penyerahan_memori_kontra,
            'relas_inzage' => $relas_inzage,
            'relas_putusan_sela' => $relas_putusan_sela,
            'relas_panggilan_sela' => $relas_panggilan_sela,
            'relas_putusan' => $relas_putusan,
            'pencabutan' => $pencabutan,
            'relas_pemberitahuan_pencabutan' => $relas_pemberitahuan_pencabutan,
            'redaksi' => $redaksi,
            'pengiriman_berkas' => $pengiriman_berkas,

        ];
        if (!$db->table('referensi_biaya_banding')->countAllResults()) {
            $db->table('referensi_biaya_banding')->insert($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('skum/biaya_tk_banding'));
        } else {
            $db->table('referensi_biaya_banding')->update($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('skum/biaya_tk_banding'));
        }
    }

    public function biaya_tk_kasasi()
    {
        $db = db_connect();
        $ref_biaya = $db->table('referensi_biaya_kasasi')->get()->getRowArray();

        return view('ref_biaya_tk_kasasi', ['data' => $ref_biaya]);
    }

    public function simpan_ref_biaya_tk_kasasi()
    {

        $pendaftaran = str_replace('.', '', $this->request->getVar('pendaftaran'));
        $penyerahan_akta = str_replace('.', '', $this->request->getVar('penyerahan_akta'));
        $biaya_kasasi = str_replace('.', '', $this->request->getVar('biaya_kasasi'));
        $relas_pemberitahuan_pernyataan = str_replace('.', '', $this->request->getVar('relas_pemberitahuan_pernyataan'));
        $relas_penyerahan_memori_kontra = str_replace('.', '', $this->request->getVar('relas_penyerahan_memori_kontra'));

        $relas_putusan = str_replace('.', '', $this->request->getVar('relas_putusan'));

        $redaksi = str_replace('.', '', $this->request->getVar('redaksi'));
        $pengiriman_berkas = str_replace('.', '', $this->request->getVar('pengiriman_berkas'));

        $db = db_connect();

        $data = [

            'pendaftaran' => $pendaftaran,
            'penyerahan_akta' => $penyerahan_akta,
            'biaya_kasasi' => $biaya_kasasi,
            'relas_pemberitahuan_pernyataan' => $relas_pemberitahuan_pernyataan,
            'relas_penyerahan_memori_kontra' => $relas_penyerahan_memori_kontra,
            'relas_putusan' => $relas_putusan,

            'redaksi' => $redaksi,
            'pengiriman_berkas' => $pengiriman_berkas,

        ];
        if (!$db->table('referensi_biaya_kasasi')->countAllResults()) {
            $db->table('referensi_biaya_kasasi')->insert($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('skum/biaya_tk_kasasi'));
        } else {
            $db->table('referensi_biaya_kasasi')->update($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('skum/biaya_tk_kasasi'));
        }
    }

    public function biaya_tk_pk()
    {
        $db = db_connect();
        $ref_biaya = $db->table('referensi_biaya_pk')->get()->getRowArray();

        return view('ref_biaya_tk_pk', ['data' => $ref_biaya]);
    }

    public function simpan_ref_biaya_tk_pk()
    {

        $pendaftaran = str_replace('.', '', $this->request->getVar('pendaftaran'));
        $penyerahan_akta = str_replace('.', '', $this->request->getVar('penyerahan_akta'));
        $biaya_pk = str_replace('.', '', $this->request->getVar('biaya_pk'));
        $relas_pemberitahuan_pernyataan = str_replace('.', '', $this->request->getVar('relas_pemberitahuan_pernyataan'));
        $relas_penyerahan_kontra = str_replace('.', '', $this->request->getVar('relas_penyerahan_kontra'));

        $relas_putusan = str_replace('.', '', $this->request->getVar('relas_putusan'));

        $novum = str_replace('.', '', $this->request->getVar('novum'));
        $redaksi = str_replace('.', '', $this->request->getVar('redaksi'));
        $pengiriman_berkas = str_replace('.', '', $this->request->getVar('pengiriman_berkas'));

        $db = db_connect();

        $data = [

            'pendaftaran' => $pendaftaran,
            'penyerahan_akta' => $penyerahan_akta,
            'biaya_pk' => $biaya_pk,
            'relas_pemberitahuan_pernyataan' => $relas_pemberitahuan_pernyataan,
            'relas_penyerahan_kontra' => $relas_penyerahan_kontra,
            'relas_putusan' => $relas_putusan,

            'novum' => $novum,
            'redaksi' => $redaksi,
            'pengiriman_berkas' => $pengiriman_berkas,

        ];
        if (!$db->table('referensi_biaya_pk')->countAllResults()) {
            $db->table('referensi_biaya_pk')->insert($data);
            session()->setFlashdata('success', 'Data berhasil disimpan');
            return redirect()->to(base_url('skum/biaya_tk_pk'));
        } else {
            $db->table('referensi_biaya_pk')->update($data);
            session()->setFlashdata('success', 'Data berhasil diupdate');
            return redirect()->to(base_url('skum/biaya_tk_pk'));
        }
    }

    public function kasir()
    {
        $db = db_connect();
        $ref_biaya = $db->table('kasir')->get()->getRowArray();

        return view('v_daftar_kasir', ['data' => $ref_biaya]);
    }

    public function datatable_kasir()
    {
        $db = db_connect();
        $queryBuilder = $db->table('kasir')->orderBy('id', 'desc');

        $datatables = new DataTables($queryBuilder, '4');
        $datatables->addSequenceNumber();
        $datatables->only(['nama', 'nip']);


        $datatables->generate(); // done
    }

    public function modal_kasir()
    {
        return $this->response->setJSON([view('modal_kasir')]);
    }


    public function insert_kasir()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi',

                ]
            ]
        ])) {

            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to(base_url('skum/kasir'));
        }

        $nama = $this->request->getVar('nama');
        $nip = $this->request->getVar('nip');

        $data = [
            'nama' => $nama,
            'nip' => $nip,

        ];
        $db = db_connect();
        if ($db->table('kasir')->insert($data)) {
            session()->setFlashdata('success', 'Kasir berhasil diinput');
            return redirect()->to(base_url('skum/kasir'));
        } else {
            session()->setFlashdata('validasi', ['Kasir gagal diinput']);
            return redirect()->to(base_url('skum/kasir'));
        }
    }


    public function modal_edit_kasir()
    {
        $db = db_connect();
        $kasir = $db->table('kasir')->get()->getRowArray();

        return $this->response->setJSON([view('modal_edit_kasir', ['data' => $kasir])]);
    }

    public function update_kasir()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi'
                ]
            ],
            'nip' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email harus diisi',

                ]
            ]
        ])) {

            session()->setFlashdata('validasi', $this->validation->getErrors());
            return redirect()->to(base_url('skum/kasir'));
        }

        $nama = $this->request->getVar('nama');
        $nip = $this->request->getVar('nip');

        $data = [
            'nama' => $nama,
            'nip' => $nip,

        ];
        $db = db_connect();
        if ($db->table('kasir')->update($data)) {
            session()->setFlashdata('success', 'Kasir berhasil diupdate');
            return redirect()->to(base_url('skum/kasir'));
        } else {
            session()->setFlashdata('validasi', ['Kasir gagal diupdate']);
            return redirect()->to(base_url('skum/kasir'));
        }
    }
}
