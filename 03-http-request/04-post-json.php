<?php
$postdata = file_get_contents("php://input");

if(!empty($postdata)){
    $data = json_decode($postdata, true);

    var_dump($data);
}

