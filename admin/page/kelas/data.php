<?php include_once('../../../_header.php'); ?>
<?php

			    $carikode = mysqli_query($con, "SELECT MAX(kd_kelas) FROM tb_kelas ") or die (mysqli_error($con));
			    $datakode = mysqli_fetch_array($carikode);
			    if($datakode) {
			    $nilaikode = substr($datakode[0], 2);
			    $kode = (int) $nilaikode;
			    $kode = $kode + 1;
			    $hasilkode = "K".str_pad($kode, 2, "0", STR_PAD_LEFT);
			    }else{
			    $hasilkode = "K01";
			    }

			?>
<h2>Kelas</h2>
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
                                            <label for="nama_kelas">Nama Kelas</label>
                                            <input type="hidden" name="kd_kelas" class="form-control" value="<?= $hasilkode ?>">
                                            <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas">
                                        </div>
                                        <div class="form-group">
                                            <label for="kd_jurusan">Jurusan</label>
                                            <select class="form-control" name="kd_jurusan" id="kd_jurusan" style="width: 100%">
                                                <option value="">- Pilih</option>
                                                <?php
                                                    $sql_jurusan = mysqli_query($con, "SELECT * FROM tb_jurusan ORDER BY nama_jurusan ASC") or die (mysqli_error($con));
                                                    while($data_jurusan = mysqli_fetch_array($sql_jurusan)) {
                                                        echo "<option value='$data_jurusan[kd_jurusan]'>$data_jurusan[kd_jurusan] | $data_jurusan[nama_jurusan]</option>";
                                                    } ?>
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="col-md-6 themed-grid-col"><div class="form-group">
                                            <label for="th_ajar">Tahun Ajaran</label>
                                            <input type="text" name="th_ajar" id="th_ajar" class="form-control" placeholder="Tahun Ajaran" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">Wali Kelas</label> <br>
                                            <select class="form-control" name="nip" id="nip" style="width: 100%">
                                                <option value="">- Pilih Wali Kelas</option>
                                                <?php
                                                    $sql_kelas = mysqli_query($con, "SELECT * FROM tb_guru ORDER BY nama_guru ASC") or die (mysqli_error($con));
                                                    while($data_kelas = mysqli_fetch_array($sql_kelas)) {
                                                        echo "<option value='$data_kelas[nip]'>$data_kelas[nip] | $data_kelas[nama_guru]</option>";
                                                    } ?>
                                            </select> 
                                            <input type="hidden" name="status" id="status" class="form-control" value="ya">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="add" value="Simpan" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
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
					<th>Kode Kelas</th>
                    <th>Nama Kelas</th>                    
                    <th>Wali Kelas</th> 
                    <th>Nama Jurusan</th>
                    <th>Tahun Ajaran</th>                        
					<th align="center"><i class="fa fa-cogs"></i> Opsi</th>
				</tr>
			</thead>
			<tbody>
					<?php
					$no = 1;
					$sql_buku = mysqli_query($con, "SELECT * FROM tb_kelas INNER JOIN tb_guru ON tb_kelas.nip = tb_guru.nip JOIN tb_jurusan ON tb_kelas.kd_jurusan = tb_jurusan.kd_jurusan") or die (mysqli_error($con));
					while($data = mysqli_fetch_array($sql_buku)) { ?>					
						<tr>
							<td><?=$no++?>.</td>
							<td><?=$data['kd_kelas']?></td>
                            <td><?=$data['nama_kelas']?></td>                            
                            <td><?=$data['nama_guru']?></td>
                            <td><?=$data['nama_jurusan']?></td>                            
                            <td><?=$data['th_ajar']?></td>                           
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
        <!-- SELECT WALI KELAS -->
        <script type="text/javascript">
          $(document).ready(function(){

          // Initialize Select2
          $('#nip').select2();
          $('#kd_jurusan').select2();

          // Set option selected onchange
          $('#user_selected').change(function(){
            var value = $(this).val();

            // Set selected
            $('#kd_jurusan').val(value);
            $('#kd_jurusan').select2().trigger('change');
            $('#nip').val(value);
            $('#nip').select2().trigger('change');

          });
        });
        </script>
<?php include_once('../../../_footer.php'); ?>