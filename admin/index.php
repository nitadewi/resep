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

        <title>Halaman Admin</title>

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
                            <li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li>
                                <a class="active" href="index.html"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="form.php"><i class="fa fa-edit fa-fw"></i> Forms</a>
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
                            <h1 class="page-header">Daftar Postingan Resep</h1>
                        </div>

                           <!-- /.col-lg-12 -->
                        <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    daftar artikel
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                    <a  class="btn btn-success" href="tambah_produk.php">Tambah Resep</a>
                                    <br>
                                    <br>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                <th>No</th>
                                                <th>judul</th>
                                                <th>Resep</th>
                                                <th>Gambar</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            // jalankan query untuk menampilkan semua data diurutkan berdasarkan id
                                            $query = "SELECT * FROM resep ORDER BY id ASC";
                                            $result = mysqli_query($connect, $query);
                                            //mengecek apakah ada error ketika menjalankan query
                                            if(!$result){
                                                die ("Query Error: ".mysqli_errno($connect).
                                                " - ".mysqli_error($connect));
                                            }

                                            //buat perulangan untuk element tabel dari data mahasiswa
                                            $no = 1; //variabel untuk membuat nomor urut
                                            // hasil query akan disimpan dalam variabel $data dalam bentuk array
                                            // kemudian dicetak dengan perulangan while
                                            while($row = mysqli_fetch_assoc($result))
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['judul']; ?></td>
                                                <td><?php echo substr($row['deskripsi'], 0, 20); ?>...</td>
                                                <td style="text-align: center;"><img src="gambar/<?php echo $row['gambar_produk']; ?>" style="width: 120px;"></td>
                                                <td>
                                                    <a class="btn btn-success" href="edit.php?id=<?php echo $row['id']; ?>"><i class="glyphicon glyphicon-pencil"></i></a> 
                                                    <a class="btn btn-danger" href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
                                                    <a class="btn btn-default" href="lihat.php?id=<?php echo $row['id']; ?>">Lihat</a> 
                                                    
                                                </td>
                                            </tr>
                                                
                                            <?php
                                                $no++; //untuk nomor urut terus bertambah 1
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                     
                     </div>
                     </div>
                     </div>
                    <!-- /.row -->
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
        <script src="../js/startmin.js"></script>

       

        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });
        </script>

    </body>
</html>
