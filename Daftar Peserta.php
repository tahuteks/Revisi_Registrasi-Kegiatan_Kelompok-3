<!DOCTYPE html>
<html lang="en">
    <style>
        .estetik-button {
          background-color: #ffb6c1;
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
    <title>Daftar Peserta</title>
</head>
<body style="background-color: rgb(26, 125, 238);">


        <?php

        $db = new mysqli("localhost", "root", "", "kegiatan");

        $result = mysqli_query($db, "SHOW TABLES");

        $tables = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $daftarNamaTabel = [];
        $daftarKegiatan = [];

        foreach($tables as $table) {
            $namaTabel = $table["Tables_in_kegiatan"];  
            $daftarNamaTabel[] = $namaTabel;
            $daftarKegiatan[] = $db->query("SELECT * FROM $namaTabel");

        }

        // $eletktrik = $db->query("SELECT * FROM elektrik");
        // $go = $db->query("SELECT * FROM go_green");
        // $fuel = $db->query("SELECT * FROM green_fuel");

        ?>
    
    <?php for($i = 0; $i < count($daftarKegiatan); $i++): ?>
    <h1><?= $daftarNamaTabel[$i]; ?></h1>
        <div id="table Electricity">
            <table border="2" cellspacing="0" cellpadding="10">

                <tr bgcolor="White">
                    <th align="center">No</th>
                    <th align="center">Nama</th>
                    <th align="center">Domisili</th>
                    <th align="center">Nim</th>
                    <th align="center">Nomer HP</th>
                    <th align="center">Email</th>
                    <th align="center">Foto KTP</th>
                </tr>

                <?php foreach($daftarKegiatan[$i] as $row): ?>
                <tr bgcolor = "white">
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["nama"]; ?></td>
                    <td><?= $row["domisili"]; ?></td>
                    <td><?= $row["nim"]; ?></td>
                    <td><?= $row["nomer_hp"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><img src="img/<?= $row["foto_ktp"]; ?>" alt="" width="100"></td>
                </tr>
                <?php endforeach; ?>
                
            </table>
        </div>
    <?php endfor; ?>

    <form action="Registrasi_Kegiatan.php">
        <input  class = "estetik-button" type="submit" align = "center" name="Back"   value="Back">
    </form>
</body>
</html>