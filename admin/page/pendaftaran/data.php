<?php include_once('../../../_header.php'); ?>
<h2>Pendaftaran</h2>
<div class="pull-right">
        <p>            
              <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Tambah Data
              </a>
                <a href="" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i>Refresh</a>
                <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                            <?php

                $carikode = mysqli_query($con, "SELECT MAX(no_daftar) FROM tb_pendaftaran ") or die (mysqli_error($con));
                $datakode = mysqli_fetch_array($carikode);
                if($datakode) {
                $nilaikode = substr($datakode[0], 2);
                $kode = (int) $nilaikode;
                $kode = $kode + 1;
                $hasilkode = "P".str_pad($kode, 2, "0", STR_PAD_LEFT);
                }else{
                $hasilkode = "P01";
                }

            ?>
                <form action="proses.php" method="post">
                    <div class="row mb-3">
                        <div class="col-md-6 themed-grid-col">
                          <div class="pb-3">
                              <div class="form-group">
                                <label for="nama_siswa">Nama Calon Siswa</label>
                                <input type="hidden" name="no_daftar" class="form-control" value="<?= $hasilkode ?>">
                                <input type="text" name="nama_siswa" class="form-control" placeholder="Nama Calon Siswa">
                            </div>
                            <div class="form-group">
                                <label for="nama_wali">Nama Orang Tua Wali</label>
                                <input type="text" name="nama_wali" id="nama_wali" class="form-control" placeholder="Nama Orang Tua Wali" value="" required>
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-md-6 themed-grid-col"><div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telpn">No Telp</label>
                                <input type="text" name="no_telpn" id="no_telpn" class="form-control" placeholder="No Telp" value="" required>
                                <input type="hidden" name="status" id="status" class="form-control" value="ya">
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
					<th>No Daftar</th>
                    <th>Nama Siswa</th>                    
                    <th>Nama Wali</th>   
                    <th>Status</th>                     
					<th align="center"><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					$sql_pendaftaran = mysqli_query($con, "SELECT * FROM tb_pendaftaran") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_pendaftaran)) { ?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['no_daftar']?></td>
                            <td><?=$data['nama_siswa']?></td>                            
                            <td><?=$data['nama_wali']?></td>
                            <td><?=$data['status']?></td>                           
                            <td align="center">
                                 <a href="edit.php?id=<?=$data['no_daftar']?>" name="editkat" class="btn btn-warning btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                <a href="del.php?id=<?=$data['no_daftar']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
						</tr>
					<?php
					}					
					?>				
				</tbody>
        </table>
        </div>
<?php include_once('../../../_footer.php'); ?>