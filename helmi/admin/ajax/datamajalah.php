<?php
sleep(1);
require '../function.php';

$keyword = $_GET["keyword"];
$query = " SELECT * FROM majalah WHERE
            judul  LIKE '%$keyword%' OR
            tahun  LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%' OR
            halaman  LIKE '%$keyword%'
            ";
$majalah = query($query);

?>



  <table border="1" cellpadding="10" cellspacing="0">
      <tr>
        <th>No.</th>
        <th>Judul</th>
        <th>Tahun</th>
        <th>Penerbit</th>
        <th>Halaman</th>
        <th>Gambar</th>
        <th>Edit</th>
      </tr>
      <?php $i = 1 ?>
      <?php foreach ($majalah as $mjl): ?>
      <tr>
        <td><?= $i ?></td>
        <td><?= $mjl["judul"] ?></td>
        <td><?= $mjl["tahun"] ?></td>
        <td><?=  $mjl["penerbit"] ?></td>
        <td><?= $mjl["halaman"] ?></td>
        <td> <img src='http://localhost/helmi/img/<?= $mjl["gambar"]?>' height="100px"></td>
        <td> <a href="ubah.php?id=<?=$mjl["id"]?>">Ubah</a> |
            <a href="hapus.php?id=<?= $mjl["id"] ?>" onclick= "return confirm ('Apakah anda yakin menghapus data tersebut?')">Hapus</a> </td>
      </tr>
      <?php $i++ ?>
    <?php endforeach; ?>
    </table>
