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

class Pengguna extends BaseController
{
    public function index()
    {
        $db = db_connect();
        $data = ($db->table('page_counter')->select('jml_kunjungan')->get()->getRowArray()) ? $db->table('page_counter')->select('jml_kunjungan')->get()->getRowArray() : 0;

        // dd($data);
        $counter = $data ? $data['jml_kunjungan'] : $data;
        $counter = ++$counter;
        // dd($counter);
        if ($data === 0) {
            $db->table('page_counter')->insert(['jml_kunjungan' => $counter]);
        } else {

            $db->table('page_counter')->update(['jml_kunjungan' => $counter]);
        };

        session()->set('counter', $counter);
        $data = [
            'title' => 'Dashboard',
            // 'counter' => $counter
        ];
        return view('user_dashboard', $data);
    }

    public function gugatan()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi gugatan',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_gugatan', $data);
    }


    public function gugatan_sederhana()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi gs',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_gugatan_sederhana', $data);
    }

    public function permohonan()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_permohonan')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi permohonan',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_permohonan', $data);
    }

    public function banding()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_banding')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi banding',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_banding', $data);
    }

    public function kasasi()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_kasasi')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi Kasasi',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_kasasi', $data);
    }

    public function peninjauan_kembali()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_pk')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi PK',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];

        return view('user_pk', $data);
    }
}
