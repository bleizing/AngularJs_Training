<?php

require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$sql = "SELECT * FROM member WHERE id = " . $data->member_id;
//echo $sql;
$result = $db->query($sql);
$json = new JSON();
if ($result) {
    if ($result->num_rows != 0) {
        $datas = $result->fetch_array();
        $json->putKeyValuePair("id", $datas["id"]);
        $json->putKeyValuePair("username", $datas["username"]);
        $json->putKeyValuePair("nama", $datas["nama"]);

        echo $json->output();
    }
}