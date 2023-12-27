<?php
   session_start();
   require 'config.php';

   // Cek apakah ada parameter 'id' yang diterima dari URL
   if (isset($_GET['id'])) {
      $mahasiswa = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }

   if(isset($_POST['submit'])){
      require 'config.php';
      // Hapus data mahasiswa berdasarkan _id
      $collection->deleteOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);

      echo  "<script> 
               alert('Data mahasiswa berhasil dihapus!');
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
  h5{
   font-family: Tekton Pro;
   color: #534D9D;
   text-align: center;
   font-size: 20px;
  }
</style>
<body>
   <div class="container col-md-8">
      <div class="row justify-content-center">
         <div class="col">
            <h3 class="text-center mb-4">Hapus Data Mahasiswa</h3>
            <!-- Sesuaikan dengan struktur data mahasiswa -->
            <h5 class="mb-4"> Apakah Anda yakin akan menghapus data mahasiswa <?php echo "$mahasiswa->nama"; ?> dengan NIM <?php echo "$mahasiswa->nim"; ?> ? </h5>
         </div>
         <form method="POST">
            <div class="form-group mb-3" align="center">
               <button type="submit" name="submit" class="btn btn-danger bi bi-eraser"> Hapus </button>
               <input type="hidden" value="<?php echo "$mahasiswa->nim"; ?>" class="form-control" name="nim">
               <a href="index.php" class="btn btn-primary bi bi-arrow-right-circle"> Batal </a>
            </div>
         </form>
      </div>
   </div>
</body>
</html>
