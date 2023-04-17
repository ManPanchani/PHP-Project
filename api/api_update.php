<?php

        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods:PUT, PATCH');

        include('config/config.php');

        $config = new Config();

        if ($_SERVER['REQUEST_METHOD'] == 'PATCH' || $_SERVER['REQUEST_METHOD'] == 'PUT') {

            parse_str(file_get_contents("php://input"), $_PUT_PATCH);

            $id = $_PUT_PATCH['id'];
            $trainName = $_PUT_PATCH['train_name'];
            $trainCode = $_PUT_PATCH['train_code'];


            $res = $config->update($trainName, $trainCode, $id);

            echo("==================");
            echo("<br>");
            print_r($res);
            echo("<br>");
            echo("==================");

            if ($res) {
                $res['msg'] = "Record update Successfully...";
            } else {
                $res['msg'] = "Record Updation failed...";
            }
        } else {
            $res['msg'] = "Only PUT or PATCH request is allowed...";
        }

        echo json_encode($res);
?>