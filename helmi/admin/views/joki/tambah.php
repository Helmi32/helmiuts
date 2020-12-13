<h4>Tambah Data</h4>
<hr>
<form action="index.php?mod=job&page=save"method="POST">
	<div class="col-md-6">
	<div class="form group">
		<label for="">ID</label>
		<input type="text" name="id" required value="<?=(isset($_POST['id']))?$_POST['id']:'';?>" class="form-control"> 
		 <span class="text-danger"><?=(isset($err['id']))?$err['id']:'';?></span>
	</div>
	<div class="form-group">
        <label for="">Nama</label>
        <input type="text" name="nama" required value="<?=(isset($_POST['nama']))?$_POST['nama']:'';?>" class="form-control">
		 <span class="text-danger"><?=(isset($err['nama']))?$err['nama']:'';?></span>
        </div>
	<div class="form group">
		<label for="">Rank</label>
		<input type="text" name="job" required value="<?=(isset($_POST['job']))?$_POST['job']:'';?>" class="form-control" id="">
		 <span class="text-danger"><?=(isset($err['job']))?$err['job']:'';?></span>
	</div>
<div class="form-group">
<label for="">Photo</label>
<img src="../media/<?=$_POST['photo']?>" width="60">
 <input type="file" name="fileToUpload" class="form-control">
 <span class="text-danger"><?=(isset($err['fileToUpload']))?$err['fileToUpload']:'';?></span>
</div>			
	 <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </div>
</form>