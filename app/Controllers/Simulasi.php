<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Simulasi extends BaseController
{
    public function index()
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
        return view('v_simulasi_gugatan', $data);
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
        return view('v_simulasi_gs', $data);
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
        return view('v_simulasi_permohonan', $data);
    }

    public function banding()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_banding')->get()->getRowArray();
        $referensi_ecourt = $db->table('referensi_biaya_ecourt')->get()->getRowArray();

        // dd($referensi);
        $data = [
            'title' => 'Simulasi gugatan',
            'assets' => assets(),
            'referensi' => $referensi,
            'referensi_ecourt' => $referensi_ecourt
        ];
        return view('v_simulasi_banding', $data);
    }

    public function kasasi()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_kasasi')->get()->getRowArray();


        // dd($referensi);
        $data = [
            'title' => 'Simulasi gugatan',
            'assets' => assets(),
            'referensi' => $referensi,

        ];
        return view('v_simulasi_kasasi', $data);
    }

    public function pk()
    {
        helper('asset_helper');
        $db = db_connect();
        $referensi = $db->table('referensi_biaya_pk')->get()->getRowArray();


        // dd($referensi);
        $data = [
            'title' => 'Simulasi gugatan',
            'assets' => assets(),
            'referensi' => $referensi,

        ];
        return view('v_simulasi_pk', $data);
    }


    public function cari_propinsi()
    {
        $data = file_get_contents(WRITEPATH . 'satker.json');

        $data = json_decode($data, true);

        // $prop = $this->request->getVar('q');

        $data_array = [];
        foreach ($data as $d) {
            // if (stripos($d['wilayah_name'], $prop) !== false) {


            $data_array[] = ['id' => $d['wilayah_code'], 'text' => $d['wilayah_name']];
            // }
        }




        $unique = $this->array_unique_by_key($data_array, 'text');


        return $this->response->setJSON($unique);
    }

    public function cari_kota()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        $prop = $this->request->getVar('propinsi_code');

        $data_array = [];
        foreach ($data as $d) {
            if ($d['prop'] == $prop) {
                $data_array[] = ['kota' => $d['kabkota']];
            }
        }


        // $unique = $this->array_unique_by_key($data_array, 'text');

        $unique = $this->array_unique_by_key($data_array, 'kota');


        return $this->response->setJSON($unique);
    }

    public function cari_kecamatan()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        $kabupaten = $this->request->getVar('kabupaten');

        $data_array = [];
        foreach ($data as $d) {
            if ($d['kabkota'] == $kabupaten) {
                $data_array[] = ['kecamatan' => $d['kec']];
            }
        }


        // $unique = $this->array_unique_by_key($data_array, 'text');

        $unique = $this->array_unique_by_key($data_array, 'kecamatan');


        return $this->response->setJSON($unique);
    }

    public function cari_kelurahan()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        $kecamatan = $this->request->getVar('kecamatan');

        $data_array = [];
        foreach ($data as $d) {
            if ($d['kec'] == $kecamatan) {
                $data_array[] = ['kec' => $d['kec'], 'kelurahan' => $d['kel']];
            }
        }


        // $unique = $this->array_unique_by_key($data_array, 'text');

        $unique = $this->array_unique_by_key($data_array, 'kelurahan');


        return $this->response->setJSON($unique);
    }

    public function biaya_panggilan()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        $kecamatan = $this->request->getVar('kecamatan');
        $kelurahan = $this->request->getVar('kelurahan');

        $data_array = [];
        foreach ($data as $d) {
            if ($d['kel'] == $kelurahan && $d['kec'] == $kecamatan) {
                $data_array[] = $d['nilai'];
            }
        }



        // $unique = $this->array_unique_by_key($data_array, 'text');

        // $unique = $this->array_unique_by_key($data_array, 'kelurahan');


        return $this->response->setJSON($data_array);
    }

    public function array_unique_by_key($array, $key)
    {
        $tmp = array();
        $result = array();
        foreach ($array as $value) {
            if (!in_array($value[$key], $tmp)) {
                array_push($tmp, $value[$key]);
                array_push($result, $value);
            }
        }
        return $result;
    }

    public function cari_satker()
    {
        $data = file_get_contents(WRITEPATH . 'satker.json');

        $data = json_decode($data, true);

        // $prop = $this->request->getVar('q');

        $data_array = [];
        foreach ($data as $d) {
            // if (stripos($d['wilayah_name'], $prop) !== false) {
            $split_satker = explode(' ', $d['satker_name']);
            if ($split_satker[1] != 'Agama' && $split_satker[1] != 'Tinggi' && $split_satker[1] != 'Tata') {

                $data_array[] = ['id' => $d['satker_code'], 'text' => $d['satker_name']];
            }


            // }
        }




        // $unique = $this->array_unique_by_key($data_array, 'text');


        return $this->response->setJSON($data_array);
    }

    public function data_radius_satker()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        $satker = $this->request->getVar('satker_code');

        $data_array = [];
        foreach ($data as $d) {
            if ($d['satker_code'] == $satker) {
                $data_array[] = ['satker' => $d['satker_name'], 'propinsi' => $d['prop_name'], 'kab' => $d['kabkota'], 'kec' => $d['kec'], 'kel' => $d['kel'], 'radius' => $d['nomor_radius'], 'nilai' => $d['nilai']];
            }
        }



        // $unique = $this->array_unique_by_key($data_array, 'text');

        // $unique = $this->array_unique_by_key($data_array, 'kelurahan');


        return $this->response->setJSON($data_array);
    }
}
