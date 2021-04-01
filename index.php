  <?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $database = "db_siswa";

    $koneksi = mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));
      //jika simpan di klik



    if(isset($_POST['bsave'])) 
    {
          $date1 = $_POST['tbirthdate'];
          $d1 = date('yyyy-mm-dd',($date1));
      //pengujian apakah data akan di edit
      if ($_GET['hal'] == "edit")
      {
        //maka data akan di edit
           $edit = mysqli_query($koneksi, "UPDATE siswa set 
                                                            nis = '$_POST[tnis]', 
                                                            nama = '$_POST[tnama]', 
                                                            birth_date = '$_POST[tbirthdate]', 
                                                            gender = '$_POST[tgender]', 
                                                            class_id = '$_POST[tclass]', 
                                                            phone = '$_POST[tphone]',
                                                            address = '$_POST[taddress]' WHERE id_siswa = '$_GET[id]'
                                                             ");
          if($edit) {
            echo "<script> 
                 alert('edit data berhasil disimpan'); 
               document.location='index.php';
            </script>";
          } else {
              echo "<script> 
                alert('edit data gagal disimpan'); 
                   document.location='index.php';
              </script>";    
          }
      }
      else
      {
          //Data akan di simpan baru 
           $simpan = mysqli_query($koneksi, "INSERT INTO siswa (nis, nama, birth_date, gender, class_id, phone, address) 
          VALUES ('$_POST[tnis]', '$_POST[tnama]', '$d1', '$_POST[tgender]', '$_POST[tclass]',
               '$_POST[tphone]', '$_POST[taddress]')");
          if($simpan) {
            echo "<script> 
                 alert('Data berhasil disimpan'); 
               document.location='index.php';
            </script>";
          } else {
              echo "<script> 
                alert('Data gagal disimpan'); 
                   document.location='index.php';
              </script>";    
          }
      }
     
    } 

    if(isset($_GET['hal'])){
      if($_GET['hal'] == "edit"){
        $tampil = mysqli_query($koneksi, "SELECT * FROM SISWA WHERE id_siswa = '$_GET[id]' ");
        $data = mysqli_fetch_array($tampil);
        if($data) {
          $vnis = $data['nis'];
          $vnama = $data['nama'];
          $vbirthdate = $data['birth_date'];
          $vgender = $data['gender'];
          $vphone = $data['phone'];
          $vclass = $data['class_id'];
          $valamat = $data['address'];
        }
      }
      else if($_GET['hal'] == "hapus")
      {
        //persiapan hapus data
        $hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$_GET[id]'");
        if($hapus)
        {
           echo "<script> 
                alert('Hapus Data suskses'); 
                   document.location='index.php';
              </script>"; 
        }
      }
    }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Data siswa</title>
  	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  </head>
  <body>
  <div class="container">


    <h1 class="text-center">SMK Wikrama</h1>
    <h2 class="text-center">PENYIMPANAN DATA SISWA</h2>


    <div class="card mt-3">
      <div class="card-header bg-primary text-white">
        FORM INPUT DATA SISWA
      </div>
             <div class="card-body">
                 <form method="post" action="">
                     <div class="form-group">
                        <label>NIS</label>
                        <input type="text" name="tnis" value="<?=@$vnis?>" class="form-control" placeholder="Input NIS disini !" requerd></input>
            </div>
            <div class="form-group">
                 <label>Name</label>
                     <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Input Nama disini !" requerd></input>
            </div>
            <div class="form-group">
                 <label>Birth Date</label>
                    <input type="date" name="talamat" value="<?=@$vbirthdate?>" class="form-control" placeholder="Input birth disini !" requerd></input>
            </div>
            <div class="form-group">
                  <label>Gender</label>
                  <select class="form-control" name="tgender">
                           <option value ="<?=@$vgender?>"><?=@$vgender?></option>
                           <option value ="laki - laki">laki - laki</option>
                           <option value  ="perempuan">perempuan</option>
                 </select>
            </div>
            <div class="form-group">
                 <label>Class Id</label>
                 <input type="text" name="tclass" value="<?=@$vclass?>" class="form-control" placeholder="Input class disini !" requerd></input>
            </div>
            <div class="form-group">
                 <label>Phone</label>
                    <input type="text" name="tphone" value="<?=@$vphone?>" class="form-control" placeholder="Input phone disini !" requerd></input>
            </div>
            <div class="form-group">
                 <label>Address</label>
                 <textarea name="taddress" class="form-control" placeholder="Input address disini !" requerd><?=@$valamat?></textarea>
            </div>
           
            <button type="submit" class="btn btn-success" name="bsave">SAVE</button>
            <button type="reset" class="btn btn-danger" name="breset">RESET</button>

        </form>
      </div>
    </div>

    <div class="card mt-3">
      <div class="card-header bg-success   text-white">
        DAFTAR SISWA SMK WIKRAMA
      </div>
      <div class="card-body">

        <table class="table table-bordered table-striped">
          <tr>
            <th>Nomor</th>
            <th>Nis</th>
            <th>name</th>
            <th>Birth Date</th>
            <th>Gender</th>
            <th>Class Id</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Aksi</th>
          </tr>
          <?php 
            $no = 1;
            $tampil = mysqli_query($koneksi, "SELECT * from siswa order by id_siswa desc");
            while ($data = mysqli_fetch_array($tampil)) :
              
          ?>
          <tr>
               <td><?=$no++;?></td>
               <td><?=$data['nis']?></td>
               <td><?=$data['nama']?></td>
               <td><?=$data['birth_date']?></td>
               <td><?=$data['gender']?></td>
               <td><?=$data['class_id']?></td>
               <td><?=$data['phone']?></td>
               <td><?=$data['address']?></td> 
               <td>
                  <a href="index.php?hal=edit&id=<?=$data['id_siswa']?>" class="btn btn-primary">Edit</a>
                  <a href="index.php?hal=hapus&id=<?=$data['id_siswa']?>" onclick="return confirm
                  ('apakah yakin ingin menghapus data ini?')"class="btn btn-danger">Hapus</a>
               </td>
          </tr>
              <?php endwhile; ?>
              </table>
        
         </div>
    </div>


  </div>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
  </html>