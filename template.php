<?php

$namaKegiatan = $_GET["submit"];

$keg = new mysqli("localhost", "root", "", "kegiatan");

//$result = $db->query("SELECT * FROM elektrik");
if(isset($_POST['proses']))
{
  //Engga ada insert buat input id, soalnya auto increment
  //Tak coba input langsung ke databasenya bisa, tanpa harus ngisi id. Apakah ngaruh?
  //Lalu apa yang menyebabkan data ini tidak tersimpan ke database? Tolong Saya.
  // Yang kiri itu nama database, yang kanan nama dari html nya
     
    $nama      = $_POST['name'];
    $domisili  = $_POST['domisili'];
    $nim       = $_POST['nim'];
    $nomer_hp  = $_POST['nomerhp'];
    $email     = $_POST['email'];
    $foto_ktp  = upload();

    $sql = "insert into $namaKegiatan (nama, domisili, nim, nomer_hp, email, foto_ktp) values ('$nama','$domisili','$nim','$nomer_hp','$email','$foto_ktp')";
    
    if($keg->Query($sql)){
      echo 'sip';
    }
    else{
      echo 'eror';
    };
    
}

function upload() {
  $namaFile = $_FILES["fotoktp"]["name"];
  $ukuranFile = $_FILES["fotoktp"]["size"];
  $error = $_FILES["fotoktp"]["error"];
  $tmpName = $_FILES["fotoktp"]["tmp_name"];

  if ($error == 4) {
      echo "<script>alert('Pilih gambar terlebih dahulu.');</script>";
      return false;
  }

  $ekstensiGambarValid = ["jpg", "jpeg", "png"];
  $ekstensiGambar = explode(".", $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      echo "<script>alert('Yang anda upload bukan gambar.');</script>";
      return false;
  }

  if ($ukuranFile > 1000000) {
      echo "<script>alert('Ukuran file terlalu besar.');</script>";
      return false;
  }

  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;

  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}

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
    <title><?= $namaKegiatan; ?></title>
</head>
<body style="background-color: rgb(0, 255, 76);">
    <h1><?= $namaKegiatan; ?></h1>

    <table>
      <form method="post" enctype="multipart/form-data">
        <tr>
          <td><label for="name" id="name3"> Nama </label></td>
          <td>:</td>
          <td><input type="text" id="name3" name="name" value=""/></td>
          
        </tr>
        <tr>
          <td><label for="domisili" id="domisili3"> Domisili </label></td>
          <td>:</td>
          <td><input type="text" id="domisili3" name="domisili" value=""/></td>
          
        </tr>
        <tr>
          <td><label for="nim" id="nim3"> Nim </label></td>
          <td>:</td>
          <td><input type="text" id="nim3" name="nim" value=""/></td>
          
        </tr>
        <tr>
          <td><label for="nomerhp" id="nomerhp3"> Nomer HP </label></td>
          <td>:</td>
          <td><input type="text" id="nomerhp3" name="nomerhp" value=""/></td>
          
        </tr>
        <tr>
          <td><label for="email" id="email3"> Email </label></td>
          <td>:</td>
          <td><input type="text" id="email3" name="email" value=""/></td>
          
        </tr>
        <tr>
          <td><label for="fotoktp" id="fotoktp3"> Foto KTP </label></td>
          <td>:</td>
          <td><input type="file" id="fotoktp3" name="fotoktp" value="Browse"/></td>
          
        </tr>
     
    </table>
    <input class = "estetik-button" type="submit" name="proses">
    </form>
    <br>

    <form action="Registrasi_Kegiatan.php">
           <input class = "estetik-button" type="submit" align = "center" name="Back"   value="Back">
    </form>
</body>
</html>