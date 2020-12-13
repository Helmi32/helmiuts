<?php
session_start();

if (!$_SESSION["login"]) {
	header("Location: ../form/login.php");
}

require "function.php";

if (isset($_POST["submit"])) {

	if (tambah($_POST) > 0) {
		echo "
          <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'index.php';
          </script>
          ";
	} else {
		echo "
          <script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'index.php';
          </script>
          ";
	}
}
;

?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title></title>
     <style media="screen">
     .tambah{
        background-color: green;
        color: white;
        padding: 0.5em 0.5em;
        text-decoration: none;
        text-transform: uppercase;
        }

        .kembali{
        background-color: orange;
        color: black;
        padding: 0.5em 0.5em;
        text-decoration: none;
        text-transform: uppercase;
        }

        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }

        div {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
     </style>

   </head>
   <body>
     <h1>Tambah Data</h1>
     <br>
     <form action="" method="post" enctype="multipart/form-data">
       <ul>
         <li><label for="judul">Judul:</label>
             <input type="text" name="judul" id="judul" required>
         </li>
         <li><label for="tahun">Tahun:</label>
             <input type="text" name="tahun" id="tahun" required>
         </li>
         <li><label for="penerbit">Penerbit:</label>
             <input type="text" name="penerbit" id="penerbit" required>
         </li>
         <li><label for="halaman">Halaman:</label>
             <input type="text" name="halaman" id="halaman"required>
         </li>
         <li><label for="gambar">Gambar:</label>
              <input type="file" name="gambar" id="gambar">
         </li>

         <br><br>
         <button type="submit" name="submit" class="tambah">Tambah</button>
       </ul>


     </form>
     <br><br><br>
     <p><a href="../" class="kembali">Kembali</a> </p>
   </body>
 </html>
