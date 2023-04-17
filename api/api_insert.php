<?php 

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: POST");

    include('config/config.php');

    $config = new Config();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $trainName = $_POST['train_name'];
        $trainCode = $_POST['train_code'];

        $res = $config->insert($trainName, $trainCode);

        if($res){
            $data['msg'] = "Record inserted Successfully...";
        }else {
            $data['msg'] = "Record insertion failed...";
        }
    } else {
        $data['msg'] = "Only POST method is allowed...";
    }

    echo json_encode($data);
?>