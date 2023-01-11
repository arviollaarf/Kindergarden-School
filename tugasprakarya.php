<?php
$conn = mysqli_connect("localhost", "root", "", "uasbasdat");

//MENAMBAH DATA 
$id_tugasprak           = "";
$nama_tugasprak         = "";
$deskripsi_tugasprak    = "";
$start_tugas            = "";
$end_tugas              = "";
$suksess                = "";
$errorr                 = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'edit') {
    $id_tugasprak        = $_GET['id_tugasprak'];
    $sql1                = "select * FROM tugas_prakarya WHERE id_tugasprak = '$id_tugasprak'";
    $q1                  = mysqli_query($conn, $sql1);
    $r1                  = mysqli_fetch_array($q1);
    $id_tugasprak        = $r1['id_tugasprak'];
    $nama_tugasprak      = $r1['nama_tugasprak'];
    $deskripsi_tugasprak = $r1['deskripsi_tugasprak'];
    $start_tugas         = $r1['start_tugas'];
    $end_tugas           = $r1['end_tugas'];
    

    if ($id_tugasprak == '') {
        $errorr = "Data tidak ditemukan";
    }
}

if (isset($_POST['simpan'])) { // untuk create 
    $id_tugasprak           = $_POST['id_tugasprak'];
    $nama_tugasprak         = $_POST['nama_tugasprak'];
    $deskripsi_tugasprak    = $_POST['deskripsi_tugasprak'];
    $start_tugas            = $_POST['start_tugas'];
    $end_tugas              = $_POST['end_tugas'];

    if ($id_tugasprak && $nama_tugasprak && $deskripsi_tugasprak && $start_tugas && $end_tugas) {
        if ($op == 'edit') { // untuk update
            $sql1 = "update tugas_prakarya set id_tugasprak='$id_tugasprak', nama_tugasprak='$nama_tugasprak', 
            deskripsi_tugasprak='$deskripsi_tugasprak', start_tugas='$start_tugas', end_tugas='$end_tugas' 
            where id_tugasprak='$id_tugasprak'";
            $q1   = mysqli_query($conn, $sql1);

            if ($q1) {
                $suksess = "Data berhasil diupdate";
            } else {
                $errorr  = "Data gagal diupdate";
            }
        } else { // untuk insert
        $sql1 = "insert into tugas_prakarya(id_tugasprak,nama_tugasprak,deskripsi_tugasprak, start_tugas,end_tugas) 
        values ('$id_tugasprak','$nama_tugasprak','$deskripsi_tugasprak','$start_tugas','$end_tugas')";
        $q1   = mysqli_query($conn, $sql1);       
        if ($q1) {
            $suksess = "Berhasil memasukkan data baru";
        } else {
            $errorr  = "Gagal memasukkan data";
        }
    }
    }else {
        $errorr  = "silahkan memasukkan semua data !";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Tugas Prakarya</title>
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
                </div>

            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tugas Prakarya Siswa</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">

                        </div>
                        <div class="card-body">

                            <?php
                            if ($errorr) {
                            ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $errorr ?>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if ($suksess) {
                            ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $suksess ?>
                                </div>
                            <?php
                            }
                            ?>

                            <form action="" method="POST">
                                <div class="mb-3 row">
                                    <label for="id_tugasprak" class="col-sm-2 col-form-label">Id</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="id_tugasprak" name="id_tugasprak" value="<?php echo $id_tugasprak ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama_tugasprak" class="col-sm-2 col-form-label">Nama Tugas</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama_tugasprak" name="nama_tugasprak" value="<?php echo $nama_tugasprak ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="deskripsi_tugasprak" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="deskripsi_tugasprak" name="deskripsi_tugasprak" value="<?php echo $deskripsi_tugasprak ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="start_tugas" class="col-sm-2 col-form-label">Start</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="start_tugas" name="start_tugas" value="<?php echo $start_tugas ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="end_tugas" class="col-sm-2 col-form-label">End</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="end_tugas" name="end_tugas" value="<?php echo $end_tugas ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                                </div>
                                <br>
                            </form>

                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                    <th>Nama Tugas</th>
                                    <th>Deskripsi</th>
                                    <th>Start</th>
                                    <th>End</th>
                                    <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ambil = $conn->query("SELECT * FROM tugas_prakarya");
                                ?>
                                <?php while ($data = $ambil->fetch_assoc()) {    ?>
                                    <tr>
                                    <td><?php echo $data['id_tugasprak']; ?></td>
                                    <td><?php echo $data['nama_tugasprak']; ?></td>
                                    <td><?php echo $data['deskripsi_tugasprak']; ?></td>
                                    <td><?php echo $data['start_tugas']; ?></td>
                                    <td><?php echo $data['end_tugas']; ?></td>
                                    <td>
                             <a href="tugasprakarya.php?op=edit&id_tugasprak=<?php echo $id_tugasprak ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                            </td>
                                        </tr>
                                    <?php } ?>


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