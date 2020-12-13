
    <div class="pull-left">
        <h4>Daftar Pegawai</h4>
    </div>
    <div class="pull-right">
        <a href="index.php?mod=joki&page=add">
            <button class="btn btn-primary">Add</button>
        </a>
    </div>
</div>
<div class="row">
    <table class="table">
        <thead>
            <tr>
                <td>
                    #
                </td>
                <td>ID</td><td>Nama</td><td>Job</td> <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if($daftar_pegawai != NULL){ 
                $no=1;
                foreach($daftar_pegawai as $row){?>
                    <tr>
                        <td><?=$no;?></td><td><?=$row['id']?></td><td><?=$row['nama'];?></td> <td><?=$row['jasa'];?></td>                        
                        <td>
                           <a href="index.php?mod=joki&page=edit&id=<?=md5($row['id'])?>"> <i class="fa fa-pencil"></i> </a>
						   <a href="index.php?mod=joki&page=delete&id=<?=md5($row['id'])?>"> <i class="fa fa-trash"></i> </a>
                        </td>
                    </tr>
               <?php $no++; }
            }?>
        </tbody>
    </table>
</div>
