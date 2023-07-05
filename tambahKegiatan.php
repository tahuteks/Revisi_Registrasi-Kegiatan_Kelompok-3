<?php 

$conn = new mysqli('localhost', 'root', '', 'kegiatan');
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    // tambah tabel di database
    $namaTabel = $_POST['nama'];
    $query = "CREATE TABLE $namaTabel (
        id int primary key auto_increment,
        nama varchar(255),
        domisili varchar(255),
        nim varchar(255),
        nomer_hp int(255),
        email varchar(255),
        foto_ktp varchar(255)
    )";
    if (mysqli_query($conn, $query)) {
        echo "
            <script>
                alert('Tabel berhasil ditambahkan');
                document.location.href = 'Registrasi_Kegiatan.php'; 
            </script> 
        ";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<form action="" method="post">
    <input type="text" name="nama" placeholder="Nama Kegiatan">
    <input type="submit" value="submit" name="submit">
</form>
