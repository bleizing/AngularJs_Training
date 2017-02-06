<?php
require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();

$data = json_decode(file_get_contents("php://input"));

$sql = "UPDATE member set username = '" . $data->username . "', nama = '" . $data->nama . "' where id = " . $data->id;
$result = $db->query($sql);
$json = new JSON();
if ($result) {
    if ($db->affected_rows == 1) {
        $msg = "berhasil mengubah data";
    } else {
        $msg = "gagal mengubah data";
    }
    $json->putKeyValuePair("msg", $msg);
    echo $json->output();
}