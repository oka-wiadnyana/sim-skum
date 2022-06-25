<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Radius extends BaseController
{
    public function index()
    {


        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', 'komdanas.mahkamahagung.go.id/jsons/radius03.json');

        if ($response->getStatusCode() == 200) {

            copy('http://komdanas.mahkamahagung.go.id/jsons/radius04.json', WRITEPATH . 'radius.json');
            // file_put_contents(ROOTPATH . 'public/tes.json', $response);

            return $this->response->setJSON(['msg' => 'success']);
        } else {
            return $this->response->setJSON(['msg' => 'fail']);
        }
    }

    public function data_radius()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        $data = json_decode($data, true);

        return view('v_data_radius');
    }

    public function data_json()
    {
        $data = file_get_contents(WRITEPATH . 'radius.json');

        // $data = $data[0];
        // dd($data);


        echo json_encode($data);
    }
}
