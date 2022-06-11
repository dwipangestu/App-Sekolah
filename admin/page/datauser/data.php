<?php include_once('../../../_header.php'); ?>
<h2>Data User</h2>
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
                        <label for="username">Username</label>
                        <input type="email" name="username" class="form-control" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswa">Nama</label>
                        <input type="text" name="nama_siswa" class="form-control" placeholder="Nama User">
                    </div>                    
                  </div>
                </div>
                
                <div class="col-md-6 themed-grid-col">                  
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" name="level" id="level" class="form-control" placeholder="Level" value="" required>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" name="add" value="Simpan" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Simpan</button>
                        <button type="reset" name="reset" value="Batal" class="btn btn-danger btn-sm"><i class="fa fa-reply-all"></i> Batal</button> 
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
					<th>ID User</th>
                    <th>Username</th>
                    <th>Nama</th>						
					<th>Password</th>
					<th>Level</th>                        
					<th><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					$sql_buku = mysqli_query($con, "SELECT * FROM tb_user") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_buku)) { ?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['id_user']?></td>
                            <td><?=$data['username']?></td>
                            <td><?=$data['nama']?></td>                          
                            <td><?=$data['password']?></td>
                            <td><?=$data['level']?></td>                            
                            <td align="center">
                                 <a href="edit.php?id=<?=$data['kode_buku']?>" name="editkat" class="btn btn-warning btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                <a href="del.php?id=<?=$data['kode_buku']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
						</tr>
					<?php
					}					
					?>				
				</tbody>
        </table>
        </div>
<?php include_once('../../../_footer.php'); ?>