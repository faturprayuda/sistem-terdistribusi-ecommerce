<?php
require 'koneksi.php';
$k = new db();

$con = mysqli_connect($k->server, $k->username, $k->password, $k->database);
$sql = "SELECT * FROM tb_barang";
$result = mysqli_query($con, $sql);

$xml = new SimpleXMLElement("<data-barang/>");
while ($row = mysqli_fetch_assoc($result)) {
    $barang = $xml->addChild("nama_barang", $row["nama_barang"]);
    $barang->addAttribute("desk_barang", $row["deskripsi_barang"]);
    $barang->addAttribute("harga", $row["harga_barang"]);
    $barang->addAttribute("gambar", $row["gambar"]);
}

echo $xml->asXML();
mysqli_free_result($result);
mysqli_close($con);
