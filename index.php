<?php

$url_gambar = "http://localhost/sistem_terdistribusi/tugas2/img/";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, "http://localhost/sistem_terdistribusi/tugas2/server/service_data.php");
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$xml = new SimpleXMLElement(curl_exec($curl));
curl_close($curl);

// $nm = "";
// foreach ($xml->nama_menu as $nama) :
//     $nm = $nama;
// endforeach;

// if ($nm != "") {
//     echo $nm;
// } else {
//     echo "gagal";
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Tabel Menu Makanan</h1>
    <table border="1">
        <tr>
            <?php foreach ($xml->nama_barang as $barang) : ?>
                <td><img src="<?= $url_gambar . $barang["gambar"] ?>" style="width:100px;"> <br> <?= $barang ?> <br> <?= $barang["desk_barang"] ?> <br> Rp. <?= $barang["harga"] ?> <br> <button><a href="<?= $url_gambar . $barang["gambar"] ?>" target="_blank">lihat barang</a></button></td>
            <?php endforeach; ?>
        </tr>
    </table>

</body>

</html>