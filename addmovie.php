<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchopedia</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
</head>

<body style="background-color: #eee;">
    <?php include("header.php"); ?>

    <div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-lg-6">
        <?php
    if ($_SESSION != NULL && isset($_SESSION['movieadding_succes'])) {
      echo '<div class="alert alert-success" role="alert">' . $_SESSION['movieadding_succes'] . '</div>';
      unset($_SESSION['movieadding_succes']);
    } else if ($_SESSION != NULL && isset($_SESSION['movieadding_danger'])) {
      echo '<div class="alert alert-danger" role="alert">' . $_SESSION['movieadding_danger'] . '</div>';
      unset($_SESSION['movieadding_danger']);
    } ?>
            <div class="card">
                <div class="card-body">
                    <form action="movieadding.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Film Adı</label>
                            <input type="text" class="form-control" name="filmAdi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Yapım Yılı</label>
                            <input type="text" class="form-control" name="cikisTarihi">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Resim</label>
                            <input type="text" class="form-control" name="resim">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konu</label>
                            <input type="text" class="form-control" name="konu">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Trailer</label>
                            <input type="text" class="form-control" name="trailer">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tür</label>
                            <input type="text" class="form-control" name="genre">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Ekle</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html>
