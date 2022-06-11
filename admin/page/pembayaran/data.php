<?php include_once('../../../_header.php'); ?>
<h2>Pembayaran</h2>
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
                                            <label for="nisn">NISN</label>
                                            <input type="text" name="nisn" class="form-control" placeholder="NISN">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_siswa">Nama Siswa</label>
                                            <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Siswa">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="" required></textarea>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6 themed-grid-col">                  
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                        </div>
                                        <div class="form-group">
                                            <label for="tgl_lahir">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="kelas">Kelas</label>
                                            <select class="form-control" name="kelas">
                                                <option value="">- Pilih</option>
                                                <?php
                                                    $sql_kelas = mysqli_query($con, "SELECT * FROM tb_kelas ORDER BY nama_kelas ASC") or die (mysqli_error($con));
                                                    while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                                        echo "<option value='$data_kelas[kd_kelas]'>$data_kelas[nama_kelas]</option>";
                                                    } ?>
                                            </select>
                                            <input type="hidden" name="status" id="status" class="form-control" value="1">
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
					<th>Kode Bayar</th>
                    <th>Nama Siswa</th>                    
                    <th>Tagihan</th>
                    <th>Status</th>                        
					<th align="center"><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					
					$sql_buku = mysqli_query($con, "SELECT * FROM tb_pembayaran INNER JOIN tb_siswa ON tb_pembayaran.nisn = tb_siswa.nisn") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_buku)) { 
						$status = ($data['status']=="1") ? "LUNAS" : "BELUM LUNAS";
						?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['kd_pembayaran']?></td>
                            <td><?=$data['nama_siswa']?></td>                            
                            <td><?=$data['tagihan']?></td>
                            <td><?=$status ?></td>                          
                            <td align="center">
                                 <a href="edit.php?id=<?=$data['kd_kelas']?>" name="editkat" class="btn btn-warning btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                <a href="del.php?id=<?=$data['kd_kelas']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
						</tr>
					<?php
					}					
					?>				
				</tbody>
        </table>
        </div>
<?php include_once('../../../_footer.php'); ?>