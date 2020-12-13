<?php
$con->auth();
$conn=$con-> koneksi();
switch(@$_GET['page']){
	case'add':
		$sql = "SELECT * FROM tb_data_pegawai";
		$job=$conn->query($sql);
		$content="views/joki/tambah.php";
		include_once 'views/template.php';
	break;
	
	case'save':
		if($_SERVER['REQUEST_METHOD']=="POST"){
			if(empty($_POST['id'])){
                $err['id']="Harus diisi";
            }
			if(empty($_POST['nama'])){
                $err['nama']="Harus diisi";
            }
			if(empty($_POST['job'])){
                $err['job']="Harus diisi";
			}
			if(!empty($_FILES['fileToUpload']['name'])){
				$target_dir = "../media/";
				$photo=basename($_FILES["fileToUpload"]["name"]);
				$target_file = $target_dir . $photo;
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Check if image file is a actual image or fake image


				// Check if file already exists
				if (file_exists($target_file)) {
					$err['fileToUpload']= "Sorry, file already exists.";
				  $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["fileToUpload"]["size"] > 1048576) {
					$err['fileToUpload']= "Sorry, your file is too large.";
				  $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
					$err['fileToUpload']= "Sorry, only JPG, JPEG, PNG & GIF are allowed.";
				  $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 1) {
				  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					$_POST['photo']=$photo;
					if(isset($_POST['photo_old']) && $_POST['photo_old']!=''){
						unlink($target_dir.$_POST['photo_old']);
					}
				  }
					else{
						$err['fileToUpload']= "Sorry, There was an error uploading file.";
					}
				}
				}
		if(!isset($err)){
				$id=$_SESSION['login']['id'];
					if(isset($_POST['edit'])){
					$id=$_POST['id'];
					$nama=$_POST['nama'];
					$job=$_POST['job'];

					if(isset($_POST['photo'])){
						$sql = "UPDATE tb_daftar_pegawai SET nama='$_POST[nama]', job='$_POST[job]',photo='$_POST[photo]' WHERE md5(id)='$_POST[id]'";	
					}else{
						$sql = "UPDATE tb_daftar_pegawai SET nama='$_POST[nama]', job='$_POST[job]' WHERE md5(id)='$_POST[id]'";
					}

					}else{
						
						if(isset($_POST['photo'])){
							$sql ="INSERT INTO tb_data_pegawai (id,nama,job,photo) 
							VALUES('$_POST[id]','$_POST[nama]','$_POST[job]','$_POST[photo]')";
						}else{
							$sql ="INSERT INTO tb_data_pegawai (id,nama,job) 
							VALUES('$_POST[id]','$_POST[nama]','$_POST[job]')";
						}
					}
					if($conn->query($sql)==TRUE){
						header('Location:'.$con->site_url().'/admin/index.php?mod=job');
					}else{
					$err['msg']="Error: " . $sql . "<br>" . $conn->error;
					}
		}
		}else{
			$err['msg']="tidak diijinkan";
		}
		if(isset($err)){
			$sql="select*from tb_data_pegawai";
			$job=$conn->query($sql);
			$content="views/joki/tambah.php";
			include_once 'views/template.php';
		}
		break;
		
		case'edit':
			$sql="select*from tb_data_pegawai where md5(id)='$_GET[id]'";
			$job=$conn->query($sql);
			$_POST=$job->fetch_assoc();
			
			$content="views/joki/tambah.php";
			include_once 'views/template.php';
		break;
			
		case'delete':
			$sql="delete from tb_data_pegawai where md5(id)='$_GET[id]'";
			$job=$conn->query($sql);
			header('Location:'.$con->site_url().'/admin/index.php?mod=job');
		break;
	default:
		$daftar_pegawai="select * from tb_data_pegawai";
		$daftar_pegawai=$conn->query($daftar_pegawai);
		$conn->close();
		$content="views/joki/tampil.php";
		include_once 'views/template.php';

}
?>	