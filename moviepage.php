<html >

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchopedia</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <script>
        function openSignInPage() {
            window.location.href = "sign-in.php";
        }

        function openSignUpPage() {
            window.location.href = "sign-up.php";
        }
    </script> 
    <style>
    body {
            background-image: url('https://wallpapercave.com/wp/wp10615910.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            opacity: 0.9;
        }
         .table {
  display: flex;
  align-items: center;
  margin-left: 8%;
    }
</style>
</head>

<body>
    <?php include("header.php"); ?>
    <?php $movie_id = $_GET['movie_id']; require_once("getsmoviedata.php"); ?>
    <section  class="table">
        <div class="container py-5">

            <div class="row">
                <div class="col-lg-4">
                    <div class="card mb-4 bg-warning">
                        <div class="card-body text-center">
                            <img src="<?php echo "$img"; ?>" alt="avatar" class="img-fluid" style="width: 150px;">
                            <p class="text-muted mb-4">
                            <h5 class="my-3"><?php echo "$name"; ?></h5>
                            </p>
                        </div>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-2">
                            <strong>Yapım Yılı:</strong>
                            <span><?php echo "$date"; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-2">
                            <strong>Tür:</strong>
                            <span><?php echo "$genre"; ?></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center p-2">
                            <strong>Puan:</strong>
                            <span><?php echo "$score"; ?></span>
                        </li>
                    </div>


                </div>
                <div class="col-lg-6">
                    <div class="card bg-warning">
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <h6 class="mb-0">TRAİLER</h6>
                                </div>
                            </div>
                            <hr class="border-top">
                            <div class="col-sm-8 text-center px-3">
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo "$trailer"; ?>" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <hr class="border-top">
                        </div>
                    </div>

                </div>
            </div>
            <div class="row py-6">
                <div class="col-md-10">
                    <div class="card mb-4 mb-md-0 bg-warning">
                        <div class="card-body">
                            <h5 class="card-title">KONUSU</h5>
                            <hr>
                            <p><?php echo "$description"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</body>

</html>