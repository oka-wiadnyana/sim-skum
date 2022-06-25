<?php

function assets()
{

    $data_table_css = base_url('myassets/DataTables/datatables.min.css');
    $data_table_script = base_url('myassets/DataTables/datatables.min.js');
    $jquery_script = base_url('myassets/jquery.3.6.0.js');
    $sweet_alert_script = base_url('myassets/sweetalert.js');


    $assets = ['data_table_css' => $data_table_css, 'data_table_script' => $data_table_script, 'jquery_script' => $jquery_script, 'sweetalert' => $sweet_alert_script];
    return $assets;
}
