<?php
require 'function.php';
 
$hasil = mysqli_query($conn, "UPDATE pembayaran
SET status_bayar = '1'
WHERE no_bayar = '" . $_GET['id'] . "'");

if ($hasil) {
echo "<script> alert('Verifikasi berhasil!');</script>";
echo "<script>location ='histori_pembayaran.php'</script>";
} else {
echo "<script> alert('Verifikasi gagal!');</script>";
echo "<script>location ='pembayaran.php'</script>";
}
                        

?>