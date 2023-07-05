<?php 

$conn = new mysqli('localhost', 'root', '', 'kegiatan');
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SHOW TABLES");

$tables = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <style>
        .estetik-button {
          background-color: #ff682d;
          color: white;
          border-radius: 4px;
          padding: 10px 20px;
          font-size: 16px;
        }
      </style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title >Registrasi_Kegiatan</title>
</head>
<body style="background-color: rgb(26, 125, 238);">
    <h1 style="font-family: 'Courier New', Courier, monospace;" align = "center">Registrasi Kegiatan</h1>

    <?php 
    
    foreach($tables as $table): 
    $namaTabel = $table["Tables_in_kegiatan"];  
      
    ?>
    <form action="template.php?submit=<?= $namaTabel; ?>">
      <input class = "estetik-button" type="submit" name="submit" value="<?= $namaTabel; ?>">
    </form>
    <?php endforeach; ?>



    <form action="tambahKegiatan.php" method="POST">
      <input class = "estetik-button" style="background-color: #F2D06B;" type="submit" name="tambahKegiatan" value="Tambah Kegiatan">
    </form>

    <form action="Daftar Peserta.php">
      <input class = "estetik-button" style="background-color: #F2B138;" type="submit" name="Daftar Peserta" value="Daftar Peserta">
    </form>
    

      <!-- <button class="estetik-button">Tombol Estetik</button>
      <button class="estetik-button"><a href="index.html">Tombol Estetik</a></button>
      <input type="submit" name="proses" value="Submit">
      <a href="index.html">pencet</a> -->

    <!-- jika menggunakan a href tidak bisa pakai input, bisanya pakai button -->

    
</body>
</html>