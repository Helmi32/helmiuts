<?php

session_start();

if (!$_SESSION["login"]) {
	header("Location: controller/login.php");
}
require 'function.php';

$buku = query("SELECT * FROM majalah");

if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}
;
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Yxuthel Shop</title>
    <style media="screen">
      .loader{
        width: 150px;
        position: absolute;
        z-index: -1;
        top: 50px;
        left: 250px;
        display: none;

      }
        a{
        background-color: green;
        color: white;
        padding: 0.5em 0.5em;
        text-decoration: none;
        text-transform: uppercase;
        }

        .delate{
        background-color: red;
        }

        .logout{
        background-color: orange;
        color: black;
        }

        .tambah{
        background-color: blue;
        }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
          border: 1px solid #dddddd;
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even) {
          background-color: #dddddd;
        }

    </style>
  </head>
  <body>

    <h1>Daftar Majalah</h1>
    <br><br>

    <form  action="" method="post">
      <input type="text" name="keyword" size="35" autofocus placeholder="Masukan sesuatu..." autocomplete="off" id="keyword">
      <img src="http://localhost/helmi/img/loader.gif" class="loader">
    </form>

    <br><br>
    <div class="container">

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
      <?php $i = 1?>
      <?php foreach ($buku as $bk): ?>
      <tr>
        <td><?=$i?></td>
        <td><?=$bk["judul"]?></td>
        <td><?=$bk["tahun"]?></td>
        <td><?=$bk["penerbit"]?></td>
        <td><?=$bk["halaman"]?></td>
        <td> <img src='../img/<?=$bk["gambar"]?>' height="100px"></td>
        <td> <a href="ubah.php?id=<?=$bk["id"]?>">Ubah</a> |
            <a href="hapus.php?id=<?=$bk["id"]?>" onclick= "return confirm ('Apakah anda yakin menghapus data tersebut?')" class="delate">Hapus</a> </td>
      </tr>
      <?php $i++?>
    <?php endforeach;?>
    </table>
  </div>

    <br>
    <p><a href="tambahData.php" class="tambah">Tambah Data</a> </p>
    <br><br>
    <br><br>
  
    <p><a href="controller/logout.php" class="logout">logout</a> </p>
<?php ?>



  <script src="ajax/jquery.js" charset="utf-8"></script>
  <script src="ajax/ajaxJquery.js" charset="utf-8"></script>
  </body>
</html>
