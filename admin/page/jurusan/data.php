<?php include_once('../../../_header.php'); ?>
<h2>Jurusan</h2>
<div class="pull-right">
        <p>            
              <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                Tambah Data
              </a>
                <a href="" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i>Refresh</a>
                <div class="collapse" id="collapseExample">
                      <div class="card card-body">
                            <div class="row">
            <div class="col-lg-5 col-lg-offset-4">
                    <?php

                        $carikode = mysqli_query($con, "SELECT MAX(kd_jurusan) FROM tb_jurusan ") or die (mysqli_error($con));
                        $datakode = mysqli_fetch_array($carikode);
                        if($datakode) {
                        $nilaikode = substr($datakode[0], 2);
                        $kode = (int) $nilaikode;
                        $kode = $kode + 1;
                        $hasilkode = "J".str_pad($kode, 2, "0", STR_PAD_LEFT);
                        }else{
                        $hasilkode = "J01";
                        }

                    ?>
                        <form action="proses.php" method="post">
                            <div class="form-group">
                                <label for="kodejurusan">Kode Jurusan</label>
                                <input type="text" name="kodejurusan" class="form-control" placeholder="Kode Jurusan" value="<?= $hasilkode?>">
                            </div>
                            <div class="form-group">
                                <label for="namajurusan">Nama Jurusan</label>
                                <input type="text" name="namajurusan" id="nama" class="form-control" placeholder="Nama Jurusan" value="" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="addjurusan" value="Simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" name="reset" value="Batal" class="btn btn-danger"><i class="fa fa-reply-all"></i> Batal</button> 
                            </div>
                        </form>
                    </div>        
                </div>
                    </div>
                </div>
</div>
	<br>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
	        <thead>
				<tr>
					<th>No.</th>
					<th>Kode Jurusan</th>
                    <th>Nama Jurusan</th>                       
					<th align="center"><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					$sql_buku = mysqli_query($con, "SELECT * FROM tb_jurusan") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_buku)) { ?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['kd_jurusan']?></td>
                            <td><?=$data['nama_jurusan']?></td>                           
                            <td align="center">
                                 <a href="edit.php?id=<?=$data['kd_jurusan']?>" name="editkat" class="btn btn-warning btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                <a href="del.php?id=<?=$data['kd_jurusan']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
						</tr>
					<?php
					}					
					?>				
				</tbody>
        </table>
        </div>
<?php include_once('../../../_footer.php'); ?>