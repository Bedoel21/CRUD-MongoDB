<?php
  session_start();

  if(isset($_POST['submit'])){
    require 'config.php';

    $insertOneResult = $collection->insertOne([
      'nim' => $_POST['nim'],
      'nama' => $_POST['nama'],
      'jurusan' => $_POST['jurusan'],
      'alamat' => $_POST['alamat'],
      'tgl_lahir' => $_POST['tgl_lahir'],
      'jenis_kelamin' => $_POST['jenis_kelamin'],
      'no_telepon' => $_POST['no_telepon'],
    ]);

    echo  "<script> 
            alert('Data mahasiswa berhasil ditambahkan!');
            document.location.href = 'index.php';
          </script>";
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Data Mahasiswa</title>
  <link rel="stylesheet" href="./vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<!-- Style -->
<style> 
  .bl{
    padding: 10px;
  }
  .container{
    width: 100%;
    margin-top: 2%;
    box-shadow: 0 3px 10px rgba(0,0,0,0.7);
    padding: 5%;
    $gradient: linear-gradient(150deg, rgba($white, .12), rgba($white, 0));
  }
  h3 {
    font-family: Cheeky Rabbit;
    font-weight: bold;
    color: #534D9D;
    font-size: 40px;
  }
  table{
    background-color: #97B4D6;
    font-family: Tekton Pro;
  }
</style>
<body>
  <div class="container col-md-8">
  <div class="row justify-content-center">
    <div class="col">
      <h3 class="text-center mb-4">Tambah Data Mahasiswa</h3>
      <form method="POST">
        <table class="table table-hover">
          <div class="container2">
            <tr>
              <td for="nim">NIM</td>
              <td><input type="text" class="form-control" name="nim" required="required"></td>
            </tr>
             
            <tr>
              <td for="nama">Nama</td>
              <td><input type="text" class="form-control" name="nama" required="required"></td>
            </tr>
             
             <tr>
              <td for="jurusan">Jurusan</td>
              <td><input type="text" class="form-control" name="jurusan" required="required"></td>
            </tr>
             
            <tr>
              <td for="alamat">Alamat</td>
              <td><textarea class="form-control" name="alamat" required="required"></textarea></td>
            </tr>

            <tr>
              <td for="tgl_lahir">Tanggal Lahir</td>
              <td><input type="date" class="form-control" name="tgl_lahir" required="required"></td>
            </tr>

            <tr>
              <td for="jenis_kelamin">Jenis Kelamin</td>
              <td>
                <select class="form-control" name="jenis_kelamin" required="required">
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </td>
            </tr>

            <tr>
              <td for="no_telepon">Nomor Telepon</td>
              <td><input type="tel" class="form-control" name="no_telepon" required="required"></td>
            </tr>
          </div>
        </table> 
        <div align="right">
          <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle" style="font-family: Tekton Pro"> Submit </button>
          <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle" style="font-family: Tekton Pro"> Cancel </a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
