<?php include_once('../../../_header.php'); ?>
<h2>Alumni</h2>
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
                                        <label for="nis">NISN</label>
                                        <input type="text" name="nisn" class="form-control" onkeyup="isi_otomatis()" id="nisn" placeholder="NISN">
                                        <!-- <select class="form-control" name="nisn">
                                            <option value="">- Pilih</option>
                                            <?php
                                                $sql_siswa = mysqli_query($con, "SELECT * FROM tb_siswa ORDER BY nama_siswa ASC") or die (mysqli_error($con));
                                                while($data_siswa = mysqli_fetch_array($sql_siswa)) {
                                                    echo "<option value='$data_siswa[nisn]'>$data_siswa[nama_siswa]</option>";
                                                } ?>
                                        </select> -->
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_siswa">Nama Siswa</label>
                                        <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Siswa">
                                    </div>                    
                                  </div>
                                </div>
                                
                                <div class="col-md-6 themed-grid-col">
                                    <div class="form-group">
                                        <label for="tahun_masuk">Tahun Masuk</label>
                                        <input type="text" name="tahun_masuk" id="tahun_masuk" class="form-control" placeholder="Tahun Masuk">
                                    </div>                  
                                    <div class="form-group">
                                        <label for="tahun_lulus">Tahun Lulus</label>
                                        <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control" placeholder="Tahun Lulus">
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

                <!-- EDIT -->

</div>
			<br>
        <div class="table-responsive">

            <form action="" method="post">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Siswa</th>
                    <th>Tahun Masuk</th>                    
                    <th>Tahun Lulus</th>                       
                    <th align="center"><i class="fa fa-cogs"></i> Opsi</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                    $no = 1;
                    $sql_alumni = mysqli_query($con, "SELECT * FROM tb_alumni INNER JOIN tb_siswa ON tb_alumni.nisn = tb_siswa.nisn") or die (mysqli_error($con));
                    while($data = mysqli_fetch_array($sql_alumni)) { ?>                   
                        <tr>
                            <td><?=$no++?>.</td>
                            <td><?=$data['nama_siswa']?></td>                            
                            <td><?=$data['tahun_masuk']?></td>
                            <td><?=$data['tahun_lulus']?></td>                        
                            <td align="center">
                                 <a href="#id" name="edit" data-toggle="collapse" class="btn btn-warning btn-sm" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" style = "margin-bottom: 5px;"><i class="fa fa-pencil-square-o"></i> Ubah</a>
                                 <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Edit</button>
                                <a href="del.php?id=<?=$data['id']?>" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-sm" style = "margin-bottom: 5px;"><i class="fa fa-trash-o"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php
                    }                   
                    ?>              
                </tbody>
        </table>
        <form action="">
            <table>
                <!-- <tr><td>NIM</td><td><input type="text" onkeyup="isi_otomatis()" name="nisn1" id="nisn1"></td></tr>
                <tr><td>nisn</td><td><input type="text" id="tahun_masuk"></td></tr>
                <tr><td>JURUSAN</td><td><input type="text" id="tahun_lulus"></td></tr> -->
            </table>
        </form>
        </form>

        <script type="text/javascript">
            function isi_otomatis(){
                var nisn = $("#nisn").val();
                $.ajax({
                    url: 'proses.php',
                    data:"nisn="+nisn,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);                    
                    $('#nama_siswa').val(obj.nama_siswa);
                    $('#tahun_masuk').val(obj.tahun_masuk);
                });
            }
        </script>
        </div>
        <p>
  <!-- <a class="btn btn-primary" data-toggle="collapse" href="#id" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Toggle first element</a>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Toggle second element</button>
  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Toggle both elements</button> -->
    </p>
        <div class="row">
          <div class="col">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
              <div class="card card-body">
                EDIT FORM
              </div>
            </div>
          </div>
        </div>
<?php include_once('../../../_footer.php'); ?>