    <?php
    require 'function.php';

    ?>
    <?php
    $kriteria = mysqli_query($conn,"SELECT ter.*, nilhar.tgl_ambil_nilai, nilhar.noinduk_siswa, krithar.nama_kriteria_harian, sis.nama_siswa
    FROM terdiri ter JOIN kriteria_nilai_harian krithar
    ON ter.id_kriteria_harian = krithar.id_kriteria_harian
    JOIN nilai_harian nilhar
    ON ter.id_nilai_harian = nilhar.id_nilai_harian
    JOIN siswa sis
    ON nilhar.noinduk_siswa = sis.noinduk_siswa
    WHERE ter.id_nilai_harian = '".$_GET['id']."'");


    $ambil = $kriteria->fetch_assoc();
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

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <td><a href="nilai_harian.php?id=<?php echo $noinduk ?>" class="btn btn-success">Nilai</a></td>
          <br></br>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">

              <span class="mb-2 text-xs">NIS &emsp;&emsp;&emsp;&emsp;&emsp;: 
                            <span class="mb-2 text-xs">
                                <?php echo $ambil['noinduk_siswa'];  ?> 
                            </span>
                        </span>
                        <br>
                        <span class="mb-2 text-xs">Nama Siswa &emsp;: 
                            <span class="mb-2 text-xs">
                                <?php echo $ambil['nama_siswa'];  ?> 
                            </span>
                        </span>
                        <br>
                        <span class="mb-2 text-xs">Tanggal &emsp;&emsp;&emsp;: 
                            <span class="mb-2 text-xs">
                                <?php echo $ambil['tgl_ambil_nilai'];  ?> 
                            </span>
                        </span>
                        <br>
                        <hr>
                        <a href="tambah_detail_harian.php?id=<?php echo $_GET['id']?>" class="btn btn-sm btn-success btn-align-right">
                            Tambah Nilai
                        </a>
                        
                        <div class="table-responsive">
                            <br>
                          <table class="display expandable-table dataTable no-footer" width="100%" role="grid">
                          <!-- <table class="table table-hover"> -->
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Kriteria Nilai Harian</th>
                                <th>Nilai</th>
                                <th>Edit</th>
                                <th>Delete</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach($kriteria as $data):?>
                                <tr>
                                  <td><?php echo $counter++;?></td>
                                  <td><?php echo $data['nama_kriteria_harian']?></td>
                                  <td><?php echo $data['nilai_harian']?></td>
                                  <td><a href="edit_detail_harian.php?id=<?php echo $data['id_nilai_harian']; ?>" class="btn btn-sm btn-warning">Edit</a></td>
                                  <td><a href="hapus_detail_harian.php?id=<?php echo $data['id_kriteria_harian']; ?>" class="btn btn-sm btn-danger">Delete</a></td>
                                </tr>
                            </tbody>
                            <?php endforeach ?>
             
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

