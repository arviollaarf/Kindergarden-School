
<?php
$conn = mysqli_connect("localhost", "root", "", "uasbasdat");
 
$nis = $_GET["nis"];

$sql = "UPDATE siswa SET status_registrasi = 1 WHERE noinduk_siswa = '$nis'";
if($conn->query($sql)) {
    echo "<script>
        alert('Data Berhasil Diverifikasi');
        window.location.href = 'registrasi.php';
    </script>";
}