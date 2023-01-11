    <?php
    require 'function.php';

    $query = "SELECT * FROM terdiri2 WHERE id_nilai_bulanan = '".$_GET['id']."'";
    $sql = mysqli_query($conn, $query);

    $counter = 1;
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Detail Nilai Bulanan</title>
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

    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                        <a class="nav-link" href="pembayaran.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill"></i></div>
                            Pembayaran
                        </a>

                        <a class="nav-link" href="histori_pembayaran.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-money-bill-alt"></i></div>
                            Histori Pembayaran
                        </a>

                        <a class="nav-link" href="registrasi.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Registrasi Siswa
                        </a>

                        <a class="nav-link" href="siswa.php">
                            <div class="sb-nav-link-icon"><i class="far fa-user"></i></div>
                            Siswa
                        </a>

                        <a class="nav-link" href="tugasprakarya.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-pencil-alt"></i></div>
                            Tugas Prakarya
                        </a>

                        <a class="nav-link" href="raport.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-award"></i></div>
                            Raport
                        </a>

                        <a class="nav-link" href="nilai-harian.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                            Penilaian Harian
                        </a>

                        <a class="nav-link" href="nilai-bulanan.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                            Penilaian Bulanan
                        </a>
                    </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4"> Detail Nilai Bulanan</h1>
                    <div class="card mb-4">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                           
                        <h3 class="text-center text-primary">Tambah Nilai Siswa </h3>
                        <hr>
                        <br>
                        <form action="" method="post">
                        <div class="form-group">
                        <label for="tgl_ambil_nilai"><b>Id Nilai Bulanan</b></label>
                            <input type="text" id="tgl_ambil_nilai" class="form-control" name="id_nilai_bulanan" readonly value="<?php echo $_GET['id']; ?>">
                        </div>
                        </div>
                        <div class="col-12">
                        <div class="form-group">
                        <label for="nama_kriteria_bulanan"><b>Kriteria Nilai</b></label>
                        <fieldset class="form-group">
                         <select id="e1" style="width:100%;" name="id_kriteria_bulanan" class="form-select" id="nama_kriteria_bulanan" required>
                        <option value=""> Kriteria Penilaian </option>
                            <?php 
                                $kriteria = $conn->query("SELECT * FROM kriteria_nilai_bulanan");
                                while ($data=mysqli_fetch_array($kriteria)) {
                            ?>
                                <option value="<?php echo $data['id_kriteria_bulanan']; ?>"><?php echo $data['nama_kriteria_bulanan']; ?></option>
                                <?php }?>
                                                                                    
                            </select>
                            </fieldset>
                          </div>
                          <br>
                            <div class="form-group">
                                <label for="nilai_bul"><b>Nilai</b></label>
                                <input type="text" id="nilai_bul" class="form-control" name="nilai_bul" required>
                           
                        </div>
                    <br>
                          <div class="form-group">
                            <button type="submit" name="tambah" value = "tambah" class="btn btn-small btn-primary mr-2">Save</button>
                            <a href="detail-nilai-bulanan.php?id=<?php echo $_GET['id'];?>" class="btn btn-small btn-danger">Cancel</a>
                          </div>
                        </form>
                        <?php
                        
                        if (isset($_POST['tambah'])) { // di submit atau tidak ?
                            
                            $id_kriteria_bulanan    = $_POST['id_kriteria_bulanan'];
                            $id_nilai_bulanan   = $_POST['id_nilai_bulanan'];
                            $nilai_bul          = $_POST['nilai_bul'];
                        
                            // masukkan data ke database
                            $query = "INSERT INTO terdiri2 VALUES 
                                      ('$id_kriteria_bulanan','$id_nilai_bulanan','$nilai_bul')";
                            $tambah= mysqli_query($conn, $query);
                            
                            if ($tambah) {
                                echo "<script>location='detail-nilai-bulanan.php?id=$id_nilai_bulanan';</script>";
                            } else {
                                echo "<script>alert('Tambah data gagal')</script>";
                            }
                            
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
