<html lang="en">
<?php
require_once("dbmovies.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopFilm</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="topmovies.css" rel="stylesheet">
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

        .score-badge {
            display: inline-block;
            background-color: orange;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .my-select {
            background-color: green;
            color: white;
        }
    </style>

</head>

<body>
    <?php include("header.php"); ?>

    <div class="event-schedule-area-two bg-color pad100">
        <div class="container">
            <!-- row end-->
            <div class="row py-3">
                <div class="col-lg-12">
                    <div class="container container-sm bg-primary py-2">';
                        <h1 class="text-white text-center">En İyi Filmler</h1>
                    </div>
                    <div class="mt-5"></div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade active show" id="home" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center" scope="col">Sıra</th>
                                            <th scope="col">Film</th>
                                            <th scope="col">Bilgi</th>
                                            <th scope="col">Puan</th>
                                            <th scope="col">Durum</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if ($_SESSION['accounts_id'] == NULL) header('Location: sign-in.php');
                                        require_once("_mysqlconnection.php");

                                        $sql = "SELECT * FROM mymovielist WHERE accounts_id = " . $_SESSION['accounts_id'] . " ORDER BY movie_score DESC";

                                        $result = mysqli_query($connection, $sql);
                                        $rank = 1;
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $movieId = $row["movie_id"];
                                                $movieQuery = "SELECT * FROM movies WHERE movie_id = $movieId;";
                                                $movieResult = mysqli_query($connection, $movieQuery);
                                                $data = mysqli_fetch_array($movieResult);
                                        ?>
                                                <tr class='inner-box'>
                                                    <th scope='row'>
                                                        <div class='event-date'>
                                                            <span><?php echo $rank; ?></span>
                                                        </div>
                                                    </th>
                                                    <td>
                                                        <div class='event-img'>
                                                            <a href="moviepage.php?movie_id=<?php echo $data['movie_id']; ?>"><img src='<?php echo $data['img']; ?>' alt='' /></a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class='event-wrap'>
                                                            <a href="moviepage.php?movie_id=<?php echo $data['movie_id']; ?>" style="text-decoration: none; color: inherit;">
                                                                <h3><?php echo $data['name']; ?></h3>
                                                            </a>

                                                            <div class='meta'>
                                                                <div class='time'>
                                                                    <span><?php echo $data['date']; ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="r-no">
                                                            <span class="score-badge"><?php echo $data['score']; ?></span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <?php if ($row['status'] == 0) {
                                                        ?> <form action="updatemystatus2.php" method="POST">
                                                                <input type="hidden" name="movie_id" value="<?php echo $row['movie_id']; ?>">
                                                                <input type="hidden" name="status" value="1">
                                                                <input type="hidden" name="myscore" value="<?php echo $row['myscore']; ?>">
                                                                <input type="hidden" name="usercount" value="<?php echo $data['usercount']; ?>">
                                                                <input type="hidden" name="score" value="<?php echo $data['score']; ?>">
                                                                <button class="btn btn-primary" type="submit">Listeye Ekle</button>
                                                            </form>
                                                        <?php } else { ?>
                                                            <form action="updatemystatus2.php" method="POST" id="mForm<?php echo $rank; ?>" onchange="document.getElementById('mForm<?php echo $rank; ?>').submit()">
                                                                <div class="form-group row">
                                                                    <div class="col-sm-8">
                                                                        <input type="hidden" name="movie_id" value="<?php echo $row['movie_id']; ?>">
                                                                        <select class="form-control my-select" id="statuss<?php echo $rank; ?>" name="status">
                                                                            <option value="1" <?php if ($row['status'] == 1) {
                                                                                                    echo 'selected';
                                                                                                } ?>>İzliyor</option>
                                                                            <option value="2" <?php if ($row['status'] == 2) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Tamamladı</option>
                                                                            <option value="3" <?php if ($row['status'] == 3) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Bıraktı</option>
                                                                            <option value="4" <?php if ($row['status'] == 4) {
                                                                                                    echo 'selected';
                                                                                                } ?>>İzlemeyi Planlıyor</option>
                                                                            <option value="5" <?php if ($row['status'] == 5) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Yakında</option>
                                                                            <option value="0" <?php if ($row['status'] == 6) {
                                                                                                    echo 'selected';
                                                                                                } ?>>Listeden Çıkar</option>
                                                                        </select>
                                                                        <input type="hidden" name="myscore" value="<?php echo $row['myscore']; ?>">
                                                                        <input type="hidden" name="usercount" value="<?php echo $data['usercount']; ?>">
                                                                        <input type="hidden" name="score" value="<?php echo $data['score']; ?>">
                                                                    </div>
                                                                </div>
                                                            </form>


                                                        <?php } ?>
                                                    </td>
                                                </tr>

                                        <?php
                                                $rank++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col end-->
            </div>
            <!-- /row end-->
        </div>
    </div>
    <?php require_once("footer.php"); ?>
</body>

</html>