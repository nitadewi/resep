<?php
  include('koneksi.php');

?>

<!DOCTYPE html>
<html>

<head>
    <title>Header</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- vuejs -->
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body>
    <div class="header-nita">
        <nav class="navbar navbar-default">
            <div class="container">
                <a class="navbar-brand" href="#">LOGO</a>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">HOME</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="hero">
            <h1>This is a Bootstrap header</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ut tempor enim.</p>
            <div class="btn btn-primary">Learn more about us</div>
            <div class="btn btn-primary">Contact us</div>
        </div>

    </div>

  
    <div class="container">
      <div class="row">
      <div class="col-sm-6 col-md-4 col-lg-3 mt-4">
                <div class="card card-inverse card-info">
                    <img class="card-img-top" src="https://picsum.photos/200/150/?random">
                    <div class="card-block">
                        <h4 class="card-title">Tawshif Ahsan Khan</h4>
                        <div class="card-text">
                            Tawshif is a web designer living in Bangladesh.
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info btn-sm">Follow</button>
                    </div>
                </div>
            </div>
      </div>
    
    </div>
   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>