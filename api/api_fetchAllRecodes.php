<?php 

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: GET");

    include('config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
   
        $records = $config->fatchAllRecords();

        $data['data'] = $records;
    } else {
        $data['msg'] = "Only GET method os allowed...";
    }

    echo json_encode($data);
?>