<?php
$conn = mysqli_connect("localhost", "root", "", "uasbasdat");

$kriteria = mysqli_query($conn, "SELECT * FROM raport WHERE id_raport = '" . $_GET['id'] . "'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title> Edit Raport Siswa</title>
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
                <h1 class="mt-4"> Edit Raport </h1>
                <div class="card mb-4">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <?php
                    $row = $kriteria->fetch_assoc();
                    $noinduk = $row['noinduk_siswa'];
                    ?>

                <form class="form form-vertical" method="POST" enctype="multipart/form-data">
                <div class="form-body">
                <div class="row">
                <div class="col-12">
                <div class="form-group">
                <label for="id_raport"><b>Id</b></label>
                <input type="text" id="id_raport" class="form-control" name="id_raport" readonly value="<?php echo $_GET['id']; ?>">
                </div>
                </div>
                <div class="form-group  mb-0 col-md-10">
                    <label for="exampleInputEmail1">Nilai Akhir</label>
                    <input type="text" name="nilai_akhir" class="form-control">
                </div>
                <div class="form-group  mb-0 col-md-10">
                    <label for="exampleInputEmail1">Nilai Huruf</label>
                    <input type="text" name="nilai_huruf" class="form-control">
                </div>
                <div class="form-group  mt-2 mb-0 col-md-10">
                    <label for="exampleInputPassword1">Catatan</label>
                    <input type="text" name="catatan" class="form-control" placeholder="Masukkan catatan">
                </div>
                <br>
                <div class="form-group  mt-2 mb-0 col-md-10">
                <button type="submit" name="edit" class=" btn btn-primary mr-6">Simpan</button>
                </div>
    
                    </form>
                </div>
            </div>
            <?php
            if (isset($_POST['edit'])) {
                $nilai_akhir   = $_POST['nilai_akhir'];
                $nilai_huruf  = $_POST['nilai_huruf'];
                $catatan      = $_POST['catatan'];

                $update         = mysqli_query($conn, "UPDATE raport
                                SET nilai_akhir ='$nilai_akhir' , nilai_huruf = '$nilai_huruf', catatan = '$catatan'
                                WHERE id_raport='" . $_GET['id'] . "'");
                if ($update) {
                    echo "<script>location='histori_raport.php?id=$noinduk';</script>";
                }
            }
            ?>