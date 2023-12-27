<?php
  session_start();
  require 'config.php';

  // Ambil data mahasiswa berdasarkan _id
  if (isset($_GET['id'])) {
    $mahasiswa = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
  }

  // Proses update data mahasiswa jika formulir disubmit
  if(isset($_POST['submit'])){
    $collection->updateOne(
      ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
      ['$set' => [
        'nim' => $_POST['nim'],
        'nama' => $_POST['nama'],
        'jurusan' => $_POST['jurusan'],
        'alamat' => $_POST['alamat'],
        'tgl_lahir' => $_POST['tgl_lahir'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'no_telepon' => $_POST['no_telepon'],
      ]
      ]
    );
    
    echo  "<script> 
            alert('Data mahasiswa berhasil diupdate!');
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
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <h3 class="text-center">Edit Data Mahasiswa</h3>
        <form method="POST">
          <table class="table table-hover">
            <div class="container2">
              <tr>
                <td for="nim">NIM</td>
                <td><input type="text" class="form-control" name="nim" value="<?php echo "$mahasiswa->nim"; ?>"></td>
              </tr>
               
              <tr>
                <td>Nama</td>
                <td><input type="text" class="form-control" name="nama" value="<?php echo "$mahasiswa->nama"; ?>"></td>
              </tr>
               
               <tr>
                <td>Jurusan</td>
                <td><input type="text" class="form-control" name="jurusan" value="<?php echo "$mahasiswa->jurusan"; ?>"></td>
              </tr>
               
              <tr>
                <td>Alamat</td>
                <td><textarea class="form-control" name="alamat"><?php echo "$mahasiswa->alamat"; ?></textarea></td>
              </tr>
              
              <tr>
                <td>Tanggal Lahir</td>
                <td><input type="date" class="form-control" name="tgl_lahir" value="<?php echo "$mahasiswa->tgl_lahir"; ?>"></td>
              </tr>
              
              <tr>
                <td>Jenis Kelamin</td>
                <td>
                  <select class="form-control" name="jenis_kelamin">
                    <option value="Laki-laki" <?php echo ($mahasiswa->jenis_kelamin == 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo ($mahasiswa->jenis_kelamin == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                  </select>
                </td>
              </tr>

              <tr>
                <td>Nomor Telepon</td>
                <td><input type="tel" class="form-control" name="no_telepon" value="<?php echo "$mahasiswa->no_telepon"; ?>"></td>
              </tr>
            </div>
          </table> 
          <div align="right">
            <button type="submit" name="submit" class="btn btn-primary bi bi-check-circle"> Submit </button>
            <a href="index.php" class="btn btn-danger bi bi-arrow-right-circle"> Cancel </a>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
