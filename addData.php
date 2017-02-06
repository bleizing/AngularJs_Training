<?php
require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$sql = "INSERT INTO member values('', '" . $data->username . "', '" . $data->nama . "')";
$result = $db->query($sql);
$json = new JSON();
if ($result) {
    $json->putKeyValuePair("msg", "berhasil menambahkan data");
} else {
    $json->putKeyValuePair("msg", "gagal menambahkan data");
}
echo $json->output();


