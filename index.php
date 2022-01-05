<?php
    //koneksi Database
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "dbmaba";

    $koneksi = mysqli_connect($host, $user, $pass, $database) or die (mysqli_eror($koneksi));

    //jika tombol simpan diklik
    if(isset($_POST['bsimpan']))
    {
        //Pengujian apakah data akan diedit atau disimpan baru
        if($_GET['hal'] == "edit")
        {
            //Data akan diedit
            $edit = mysqli_query($koneksi, "UPDATE maba set
                                                no_daftar = '$_POST[tno_daftar]',
                                                nama = '$_POST[tnama]',
                                                nik = '$_POST[tnik]',
                                                nisn = '$_POST[tnisn]',
                                                ttl = '$_POST[tttl]',
                                                alamat = '$_POST[talamat]',
                                                jenis_kelamin = '$_POST[tjenis_kelamin]',
                                                tahun_lulus = '$_POST[ttahun_lulus]',
                                                sekolah_asal = '$_POST[tsekolah_asal]',
                                                agama = '$_POST[tagama]',
                                                negara = '$_POST[tnegara]',
                                                no_hp = '$_POST[tno_hp]',
                                                email = '$_POST[temail]',
                                                nama_ayah = '$_POST[tnama_ayah]',
                                                pk_ayah = '$_POST[tpk_ayah]',
                                                nama_ibu = '$_POST[tnama_ibu]',
                                                pk_ibu = '$_POST[tpk_ibu]',
                                                gaji = '$_POST[tgaji]',
                                                jarak = '$_POST[tjarak]',
                                                transport = '$_POST[ttransport]',
                                                ttsk = '$_POST[tttsk]',
                                                prodi = '$_POST[tprodi]'
                                            WHERE id_daftar = '$_GET[id]'
                                        ");
            if($edit) //jika edit sukses
            {
                echo "<script>
                        alert('edit data Sukses');
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('edit data Gagal!!');
                        document.location='index.php';
                    </script>";
            }
        }else
        {
            //Data akan disimpan baru
            $simpan = mysqli_query($koneksi, "INSERT INTO maba (no_daftar, nama, nik, nisn, ttl, alamat, jenis_kelamin, tahun_lulus, sekolah_asal, agama, negara, no_hp, email, nama_ayah, pk_ayah, nama_ibu, pk_ibu, gaji, jarak, transport, ttsk, prodi)
                                              VALUES (  '$_POST[tno_daftar]',
                                                        '$_POST[tnama]',
                                                        '$_POST[tnik]', 
                                                        '$_POST[tnisn]',
                                                        '$_POST[tttl]',
                                                        '$_POST[talamat]',
                                                        '$_POST[tjenis_kelamin]',
                                                        '$_POST[ttahun_lulus]',
                                                        '$_POST[tsekolah_asal]',
                                                        '$_POST[tagama]',
                                                        '$_POST[tnegara]',
                                                        '$_POST[tno_hp]',
                                                        '$_POST[temail]',
                                                        '$_POST[tnama_ayah]',
                                                        '$_POST[tpk_ayah]',
                                                        '$_POST[tnama_ibu]',
                                                        '$_POST[tpk_ibu]',
                                                        '$_POST[tgaji]',
                                                        '$_POST[tjarak]',
                                                        '$_POST[ttransport]',
                                                        '$_POST[tttsk]', 
                                                        '$_POST[tprodi]')
                                        ");
            if($simpan) //jika simpan sukses
            {
                echo "<script>
                        alert('Simpan data Sukses');
                        document.location='index.php';
                    </script>";
            }
            else
            {
                echo "<script>
                        alert('Simpan data Gagal!!');
                        document.location='index.php';
                    </script>";
            }
        }
    }



        //pengujian jika tombol edit atau hapus di klik
        if(isset($_GET['hal']))
        {
            //pengujian jike edit data
            if($_GET["hal"] == "edit")
            {
                //tampil data yang akan diedit
                $tampil = mysqli_query($koneksi, "SELECT * FROM maba WHERE id_daftar = '$_GET[id]' ");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //jika data ditemukan, maka data ditampung ke dalam variabel               
                    $vno_daftar = $data['no_daftar'];
                    $vnama = $data['nama'];
                    $vnik = $data['nik'];
                    $vnisn = $data['nisn'];
                    $vttl = $data['ttl'];
                    $valamat = $data['alamat'];
                    $vjenis_kelamin = $data['jenis_kelamin'];
                    $vtahun_lulus = $data['tahun_lulus'];
                    $vsekolah_asal = $data['sekolah_asal'];
                    $vagama = $data['agama'];
                    $vnegara = $data['negara'];
                    $vno_hp = $data['no_hp'];
                    $vemail = $data['email'];
                    $vnama_ayah = $data['nama_ayah'];
                    $vpk_ayah = $data['pk_ayah'];
                    $vnama_ibu = $data['nama_ibu'];
                    $vpk_ibu = $data['pk_ibu'];
                    $vgaji = $data['gaji'];
                    $vjarak = $data['jarak'];
                    $vtransport = $data['transport'];
                    $vttsk = $data['ttsk'];
                    $vprodi = $data['prodi'];
                }
            }
            
        }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <h1 class="text-center">UAS CRUD & DATABASE DB4FREE.NET</h1>
    <h2 class="text-center">Yosua Kakase (1905063)</h2>

    <!-- Awal Card Form -->
    <div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Form Input data Calon Mahasiswa
    </div>
    <div class="card-body">
        <form method="post" action="">
            <div class="form-group">
                <label>No. Pendaftaran</label>
                <input type="text" name="tno_daftar" value="<?=@$vno_daftar?>" class="form-control" placeholder="masukan nomor pendaftaran" required>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="masukan nama sesuai ktp" required>
            </div>

            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="tnik" value="<?=@$vnik?>" class="form-control" placeholder="masukan nomor induk kependudukan" required>
            </div>

            <div class="form-group">
                <label>NISN</label>
                <input type="text" name="tnisn" value="<?=@$vnisn?>" class="form-control" placeholder="masukan nomor induk siswa nasional" required>
            </div>

            <div class="form-group">
                <label>Tempat Tanggal Lahir</label>
                <input type="text" name="tttl" value="<?=@$vttl?>" class="form-control" placeholder="masukan tempat dan tanggal lahir anda" required>
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="talamat" placeholder="masukan alamat anda"><?=@$valamat?></textarea>
            </div>

            <div class="form-group">
   			        <label>JENIS KELAMIN</label>
   			        <select class="form-control" name="tjenis_kelamin"> 
   				        <option value="<?=@$vjenis_kelamin?>"><?=@$vjenis_kelamin?></option>
   				        <option value="Pria">Pria</option>
   				        <option value="Wanita">Wanita</option>
   			        </select>
            </div>

            <div class="form-group">
                <label>Tahun Lulus</label>
                <input type="text" name="ttahun_lulus" value="<?=@$vtahun_lulus?>" class="form-control" placeholder="masukan tahun lulus" required>
            </div>

            <div class="form-group">
                <label>Sekolah Asal (SMA)</label>
                <input type="text" name="tsekolah_asal" value="<?=@$vsekolah_asal?>" class="form-control" placeholder="masukan sekolah asal anda" required>
            </div>

            <div class="form-group">
   			         <label>AGAMA</label>
   			         <select class="form-control" name="tagama"> 
   				         <option value="<?=@$vagama?>"><?=@$vagama?></option>
   				         <option value="Islam">Islam</option>
   				         <option value="Kristen">Kristen</option>
   				         <option value="Katolik">Katolik</option>
                         <option value="Konghucu">Konghucu</option>
                         <option value="Hindu">Hindu</option>
                         <option value="Budha">Budha</option>
   			         </select>
            </div>

            <div class="form-group">
   			         <label>KENEGARAAN</label>
   			         <select class="form-control" name="tnegara"> 
   				         <option value="<?=@$vnegara?>"><?=@$vnegara?></option>
   				         <option value="WNI">WNI</option>
   				         <option value="WNA">WNA</option>
   			         </select>
            </div>

            <div class="form-group">
                <label>No. Handphone</label>
                <input type="text" name="tno_hp" value="<?=@$vno_hp?>" class="form-control" placeholder="masukan nomor hp aktif" required>
            </div>

            <div class="form-group">
                <label>E-mail</label>
                <input type="text" name="temail" value="<?=@$vemail?>" class="form-control" placeholder="masukan alamat email anda" required>
            </div>

            <div class="form-group">
                <label>Nama Ayah</label>
                <input type="text" name="tnama_ayah" value="<?=@$vnama_ayah?>" class="form-control" placeholder="masukan nama sesuai ktp" required>
            </div>

            <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <input type="text" name="tpk_ayah" value="<?=@$vpk_ayah?>" class="form-control" placeholder="masukan pekerjaan" required>
            </div>

            <div class="form-group">
                <label>Nama Ibu</label>
                <input type="text" name="tnama_ibu" value="<?=@$vnama_ibu?>" class="form-control" placeholder="masukan nama sesuai ktp" required>
            </div>

            <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <input type="text" name="tpk_ibu" value="<?=@$vpk_ibu?>" class="form-control" placeholder="masukan pekerjaan" required>
            </div>

            <div class="form-group">
                <label>Penghasilan Komulatif per Bulan</label>
                <input type="text" name="tgaji" value="<?=@$vgaji?>" class="form-control" placeholder="masukan penghasilan komulatif ayah dan ibu" required>
            </div>

            <div class="form-group">
                <label>Jarak Ke Kampus</label>
                <input type="text" name="tjarak" value="<?=@$vjarak?>" class="form-control" placeholder="jarak tempat tinggal ke kampus" required>
            </div>

            <div class="form-group">
                <label>Transportasi Ke Kampus</label>
                <input type="text" name="ttransport" value="<?=@$vtransport?>" class="form-control" placeholder="transportasi ke kampus" required>
            </div>

            <div class="form-group">
                <label>Tempat Tinggal Selama Kuliah</label>
                <input type="text" name="tttsk" value="<?=@$vttsk?>" class="form-control" placeholder="rencana tinggal selama mengikuti kuliah" required>
            </div>

            <div class="form-group">
                <label>Program Studi Yang di Pilih</label>
               <select class="form-control" name="tprodi">
                   <option value="<?=@$vprodi?>"><?=@$vprodi?></option>
                   <option value="D3-Keperawatan">D3-Keperawatan></option>
                   <option value="D3-Perikanan">D3-Perikanan</option>
                   <option value="D3-Sistem Informasi">D3-Sistem Informasi</option>
               </select>
            </div>

            <button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
            <button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>
        </form>
    </div>
    </div>
    <!-- Akhir Card Form -->


    <!-- Awal Card tabel -->
    <div class="card mt-3">
    <div class="card-header bg-dark text-white">
        Daftar Calon Mahasiswa Polnustar
    </div>
    <div class="card-body">
        
    <table class="table table-boordered table-striped">
        <tr>
            <th>NO</th>
            <th>NO. PENDAFTARAN</th>
            <th>NAMA</th>
            <th>NIK</th>
            <th>NISN</th>
            <th>TTL</th>
            <th>ALAMAT</th>
            <th>JENIS KELAMIN</th>
            <th>TAHUN LULUS</th>
            <th>SEKOLAH ASAL</th>
            <th>AGAMA</th>
            <th>KENEGARAAN</th>
            <th>NO. HP</th>
            <th>EMAIL</th>
            <th>NAMA AYAH</th>
            <th>PEKERJAAN AYAH</th>
            <th>NAMA IBU</th>
            <th>PEKERJAAN IBU</th>
            <th>PENGHASILAN</th>
            <th>JARAK KE KAMPUS</th>
            <th>TRANSPORTASI</th>
            <th>TINGGAL</th>
            <th>PRODI</th>
            <th>AKSI</th>
        </tr>
        <?php
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from maba order by id_daftar desc");
            while($data = mysqli_fetch_array($tampil)) : 

        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$data['no_daftar']?></td>
            <td><?=$data['nama']?></td>
            <td><?=$data['nik']?></td>
            <td><?=$data['nisn']?></td>
            <td><?=$data['ttl']?></td>
            <td><?=$data['alamat']?></td>
            <td><?=$data['jenis_kelamin']?></td>
            <td><?=$data['tahun_lulus']?></td>
            <td><?=$data['sekolah_asal']?></td>
            <td><?=$data['agama']?></td>
            <td><?=$data['negara']?></td>
            <td><?=$data['no_hp']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['nama_ayah']?></td>
            <td><?=$data['pk_ayah']?></td>
            <td><?=$data['nama_ibu']?></td>
            <td><?=$data['pk_ibu']?></td>
            <td><?=$data['gaji']?></td>
            <td><?=$data['jarak']?></td>
            <td><?=$data['transport']?></td>
            <td><?=$data['ttsk']?></td>
            <td><?=$data['prodi']?></td>
            <td>
                <a href="index.php?hal=edit&id=<?=$data['id_daftar']?>" class="btn btn-warning"> Edit </a>
            </td>
        </tr>
        <?php endwhile; //penutup perulangan while ?>
    </table>

    </div>
    </div>
    <!-- Akhir Card tabel -->
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>