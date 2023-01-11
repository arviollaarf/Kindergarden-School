<?php
$conn = mysqli_connect("localhost", "root", "", "uasbasdat");

    $query      = "SELECT * FROM terdiri2 WHERE id_kriteria_bulanan = '".$_GET['id']."'";
    $db         = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($db);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Nilai Harian Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-info">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.php">TK Al-Muslim</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <div id="main-content">
              <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Tambah Detail Nilai Bulanan</h3>
                        </div>
                    </div>
                </div>
        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
            <div class="row match-height">
                <div class="col-md col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <!-- <form class="form form-vertical" action="../proses/create/tambah-tugas-proses.php" method="POST"> -->
                                <form class="form form-vertical" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                    <div class="row">
                                    <div class="col-12">
                                    <div class="form-group">
                                    <label for="id_nilai_bulanan"><b>Id Nilai Bulanan</b></label>
                                    <input type="text" id="id_nilai_bulanan" class="form-control" name="id_nilai_bulanan" readonly value="<?php echo $row['id_nilai_bulanan']; ?>">
                                    </div>
                                    </div>
                                    <div class="col-12">
                                    <div class="form-group">
                                    <label for="nama_kriteria_bulanan"><b>Kriteria Nilai Bulanan</b></label>
                                    <fieldset class="form-group">
                                    <select id="e1" style="width:100%;" name="id_kriteria_bulanan" class="form-select" id="nama_kriteria_bulanan" required>
                                    <?php 
                                        $kriteria = $conn->query("SELECT * FROM kriteria_nilai_bulanan");
                                        while ($data=mysqli_fetch_array($kriteria)) {
                                    ?>
                                        <option value="<?php echo $data['id_kriteria_bulanan']; ?>"><?php echo $data['nama_kriteria_bulanan']; ?></option>
                                        <?php
                                            }
                            ?>                                                               
                                        </select>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nilai_bul"><b>nilai_bulanan</b></label>
                                    <input type="text" id="nilai_bul" class="form-control" name="nilai_bul" value="<?php echo $row['nilai_bul'] ?>" required>
                                </div>
                            </div>
                        
                            <div class="col-12 d-flex justify-content-end mt-5">
                                <button type="submit" class="btn btn-primary me-2 mb-1" name="simpan" value="simpan">Simpan</button>
                                <button type="button" class="btn btn-danger me-2 mb-1" onclick="self.history.back()">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                            if (isset($_POST['simpan'])){
                            $id_kriteria_bulanan    = $_POST['id_kriteria_bulanan'];
                            $id_nilai_bulanan = $_POST['id_nilai_bulanan'];
                            $nilai_bul        = $_POST['nilai_bul'];
                            
                            $update = "UPDATE terdiri2
                                        SET 
                                            id_kriteria_bulanan = '$id_kriteria_bulanan',
                                            id_nilai_bulanan = '$id_nilai_bulanan',
                                            nilai_bul = '$nilai_bul'
                                            
                                        WHERE id_kriteria_bulanan = '$id_kriteria_bulanan' AND id_nilai_bulanan = '$id_nilai_bulanan'";
                            $hasil  = mysqli_query($conn, $update);
                    
                            echo "<script>alert('Nilai berhasil diperbarui !');</script>";
                            echo "<script>location.href='detail-nilai-bulanan.php?id=$id_nilai_bulanan'</script>"; 
                            }                           
                        ?>
                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>