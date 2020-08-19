<?php
  include('../koneksi.php');

  session_start(); // Start session nya

  // Kita cek apakah user sudah login atau belum
  // Cek nya dengan cara cek apakah terdapat session username atau tidak
  if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
      header("location: ../login.php"); // Kita Redirect ke halaman index.php karena belum login
  }

   // mengecek apakah di url ada nilai GET id
   if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM resep WHERE id='$id'";
    $result = mysqli_query($connect, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($connect).
         " - ".mysqli_error($connect));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Halaman Tambah</title>

          <!-- DataTables CSS -->
          <link href="../css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

            <!-- DataTables Responsive CSS -->
            <link href="../css/dataTables/dataTables.responsive.css" rel="stylesheet">


        <!-- Bootstrap Core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../css/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../css/startmin.css" rel="stylesheet">
        <!-- <link href="css/style.css" rel="stylesheet"> -->

        <!-- Custom Fonts -->
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>

        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">ADMIN</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Website</a></li>
                </ul>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nama']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a class="active" href="form.php"><i class="fa fa-edit fa-fw"></i> Resep</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.sidebar-collapse -->
                </div>
                <!-- /.navbar-static-side -->
            </nav>

            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Resep <?php echo $data['judul']; ?></h1>
                        </div>
                    </div>
                           <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="POST" action="proses_edit.php" enctype="multipart/form-data" >
                                            <section class="base">
                                            <input name="id" value="<?php echo $data['id']; ?>"  hidden />
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input class="form-control" type="text" name="judul" value="<?php echo $data['judul']; ?>" autofocus="" required="" />
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" rows="3" name="deskripsi" required="">
                                                    <?php echo $data['deskripsi']; ?>
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar Produk</label>
                                                <img src="gambar/<?php echo $data['gambar_produk']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
                                                <input type="file" name="gambar_produk" />
                                                <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Simpan</button>
                                                <button type="reset" class="btn btn-danger">Reset</button>
                                            </div>
                                            </section>
                                        </form>    
                                    </div>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="../js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../js/metisMenu.min.js"></script>

            <!-- DataTables JavaScript -->
        <script src="../js/dataTables/jquery.dataTables.min.js"></script>
        <script src="../js/dataTables/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>
    </body>
</html>
