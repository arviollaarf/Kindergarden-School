    <?php
    $conn = mysqli_connect("localhost", "root", "", "uasbasdat");

    $siswa = mysqli_query($conn, "SELECT * FROM siswa")

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Raport Siswa</title>
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
                    <h1 class="mt-4">Daftar Siswa</h1>
                    <ol class="breadcrumb mb-4">
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                        <table id="datatablesSimple">
                        <!-- <table class ="table table-bordered" id="dataTable" width = "100%" cellspasing = "0"> -->
                        <thead>
                            <tr>
                            <th>NIS</th>
                            <th>Nama siswa</th>
                            <th style="width: 1%;">Show</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = $siswa->fetch_assoc()): 
                        ?>                                   
                        <tr>
                            <td><?= $row["noinduk_siswa"] ?></td>
                            <td><?= $row["nama_siswa"] ?></td>
                            <td><a href="histori_raport.php?id=<?= $row["noinduk_siswa"] ?>" class="btn btn-primary">Show</a></td>                                   
                        </tr>
                        <?php endwhile; ?>
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