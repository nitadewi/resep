<?php
  include('../koneksi.php');

  session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
if( ! isset($_SESSION['username'])){ // Jika tidak ada session username berarti dia belum login
	header("location: ../login.php"); // Kita Redirect ke halaman index.php karena belum login
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
                                <a class="active" href="form.php"><i class="fa fa-edit fa-fw"></i> Form</a>
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
                            <h1 class="page-header">Resep</h1>
                        </div>
                    </div>
                           <!-- /.col-lg-12 -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    resep
                                </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <form method="POST" action="proses_tambah.php" enctype="multipart/form-data" >
                                            <section class="base">
                                            <div class="form-group">
                                                <label>Nama Produk</label>
                                                <input class="form-control" type="text" name="judul" autofocus="" required="" />
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi</label>
                                                <textarea class="form-control" type="text" name="deskripsi" autofocus="" required="">
                                                </textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar Produk</label>
                                                <input type="file" name="gambar_produk" required="" />
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

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
