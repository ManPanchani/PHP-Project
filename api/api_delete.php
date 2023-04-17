<?php 

    header("Content-Type: application/json");
    header("Access-Control-Allow-Methods: DELETE");

    include('config/config.php');

    $config = new Config();

    if($_SERVER['REQUSET_METHOD'] == 'DELETE') {

            $input = file_get_contents("php://input");

            parse_str($input, $_DELETE['id']);       

            $res = $config->delete($_DELETE['id']);

            if($res){
                $data['msg'] = "Record deleted Successfully...";
            }else {
                $data['msg'] = "Record deletion failed...";
            }
    } else {
        $data['msg'] = "Only DELETE method is allowed...";
    }

    echo json_encode($data);
?>