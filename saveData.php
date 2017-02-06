<?php

require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();
$json = new JSON();

$data = json_decode(file_get_contents("php://input"));

$id = $data->id;
$username = $data->username;
$nama = $data->nama;

$sql = "SELECT * FROM member WHERE id = $id";
$result = $db->query($sql);
if (!empty($username) && !empty($nama)) {
    if ($result->num_rows != 0) {
        $save = "UPDATE member set username = '$username', nama = '$nama' WHERE id = $id";
        $note = "mengubah";
    } else {
        $save = "INSERT INTO member VALUES('', '$username', '$nama')";
        $note = "menambah";
    }

    $result2 = $db->query($save);

    if ($result2) {
        $status = "berhasil";
    } else {
        $status = "gagal";
    }

    $msg = "$status $note data";


} else {
    $msg = "data tidak boleh ada yang kosong";
}
$json->putKeyValuePair("msg", $msg);
echo $json->output();