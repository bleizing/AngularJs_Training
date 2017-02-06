<?php
require_once 'database.inc';
require_once 'json.inc';

$database = new Database();
$db = $database->getConnection();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$sql = "SELECT * FROM member ORDER BY id DESC";
$result = $db->query($sql);
$json = new JSON();
if ($result) {
    if (!empty($result)) {
        $dataList = array();
        $list = array();
        $i = 0;
        while ($data = $result->fetch_assoc()) {
            $dataList["id"] = $data["id"];
            $dataList["username"] = $data["username"];
            $dataList["nama"] = $data["nama"];
            $list[$i] = $dataList;
            $i++;
        }
        $json->putArray("records", $list);
        echo $json->output();
    }
} else {
    echo "gagal";
}