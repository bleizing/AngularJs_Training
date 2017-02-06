<?php

require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();
$json = new JSON();

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;

$sql = "DELETE FROM member WHERE id = $id";
echo $sql;
$result = $db->query($sql);

if ($result) {
    $msg = "berhasil menghapus data";
} else {
    $msg = "gagal menghapus data";
}

$json->putKeyValuePair("msg", $msg);
echo $json->output();