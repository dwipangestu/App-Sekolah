<?php include_once('../../../_header.php'); ?>
<h2>Guru</h2>
<div class="pull-right">
        <p>            
              <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Tambah Data
              </a>
                <a href="" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i>Refresh</a>
                <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                        <form action="proses.php" method="post">
                            <div class="row mb-3">
                                <div class="col-md-6 themed-grid-col">
                                  <div class="pb-3">
                                      <div class="form-group">
                                        <label for="nip">NIP</label>
                                        <input type="text" name="nip" class="form-control" placeholder="NIP">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_guru">Nama Guru</label>
                                        <input type="text" name="nama_guru" class="form-control" placeholder="Nama Guru">
                                    </div>
                                    
                                  </div>
                                </div>
                                
                                <div class="col-md-6 themed-grid-col"> 
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="" required></textarea>
                                    </div>                 
                                    <div class="form-group">
                                        <label for="no_telp">No Telp</label>
                                        <input type="text" name="no_telp" class="form-control" placeholder="No Telpon">
                                    </div>                                  
                                    
                                    <div class="form-group">
                                        <button type="submit" name="add" value="Simpan" class="btn btn-success"><i class="fa fa-save"> Simpan</i></button>
                                        <button type="reset" name="reset" value="Batal" class="btn btn-danger"><i class="fa fa-reply-all"></i> Batal</button> 
                                    </div>
                                </div>
                          </div>
                        </form>
                    </div>
                </div>
</div>
			<br>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
	        <thead>
				<tr>
					<th>No.</th>
					<th>NIP</th>
                    <th>Nama</th>
                    <th>Alamat</th>					
					<th>No. Telp</th>                       
					<th align="center"><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					$sql_buku = mysqli_query($con, "SELECT * FROM tb_guru") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_buku)) { ?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['nip']?></td>
                            <td><?=$data['nama_guru']?></td>
                            <td><?=$data['alamat']?></td>                          
                            <td><?=$data['no_telp']?></td>                          
                            <td align="center">
                                 <a href="edit.php?id=<?=$data['nip']?>" name="editkat" class="btn btn-warning btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                <a href="del.php?id=<?=$data['nip']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
						</tr>
					<?php
					}					
					?>				
				</tbody>
        </table>
        </div>
<?php include_once('../../../_footer.php'); ?>