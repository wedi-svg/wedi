<?php

include "../config/koneksi.php";

$data = [];

$query = mysqli_query($kon, "SELECT * FROM `barang` ORDER BY id DESC");
if($query){
	$status = true;
	$pesan = "request success";
	while($row = mysqli_fetch_assoc($query)){
		array_push($data, $row);
	}
}else{
	$status = false;
	$pesan = "request failed";
}

$json = [
	"status" => $status,
	"pesan" => $pesan,
	"data" => $data
];

header("Content-Type: application/json");
echo json_encode($json);

?>