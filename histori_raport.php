<?php
    $conn = mysqli_connect("localhost", "root", "", "uasbasdat");

    $kriteria = mysqli_query($conn, "SELECT * FROM raport WHERE noinduk_siswa = '".$_GET['id']."'");
    $counter=1;                              
    $noinduk = $_GET['id'];
    $kelbel = mysqli_query($conn, "SELECT * FROM kel_belajar WHERE kelompokbel = '$noinduk'");
   
?>

<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Histori Raport Siswa</title>
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
         
          <br></br>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
              <?php 
                  while($row = mysqli_fetch_array($kelbel)) {  
                  }
              ?>
           
              <hr>
                <table id="example1" class="table table-bordered table-hover mt-4">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>NIS</th>
                    <th>Nilai Akhir</th>
                    <th>Nilai Huruf</th>
                    <th>Catatan Rapot</th>
                    <th style="width: 1%;">Edit</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  foreach($kriteria as $row):
                ?>
                    <tr>
                    <td><?= $row["id_raport"] ?></td>
                    <td><?= $row["noinduk_siswa"] ?></td>
                    <td><?= $row["nilai_akhir"] ?></td>
                    <td><?= $row["nilai_huruf"] ?></td>
                      <td><?= $row["catatan"] ?></td>                    
                      <td><a href="edit_raport.php?id=<?php echo $row["id_raport"] ?>" class="btn btn-warning">Edit</a></td>                    
                    </tr>
                  <?php 
                endforeach
                ?>
                 </tbody>
                </table>
              </div>







                               





