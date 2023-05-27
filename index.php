<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchopedia</title>
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-image: url('https://wallpapercave.com/wp/wp10615910.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            background-attachment: fixed;
            opacity: 0.9;
        }


        .poster-container {
            overflow-x: hidden;
            overflow-y: hidden;
            white-space: nowrap;
            padding: 20px 0;
        }

        .poster-item {
            display: inline-block;
            margin-right: 10px;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .poster-item img {
            max-width: 200px;
            max-height: 300px;
        }

        .poster-item.active {
            transform: scale(1.2);
        }

        .navigation-buttons {
            text-align: center;
            margin-top: 10px;
        }

        .navigation-buttons button {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin: 0 5px;
            cursor: pointer;
        }
    </style>
    <script>
        function openSignInPage() {
            window.location.href = "sign-in.php";
        }

        function openSignUpPage() {
            window.location.href = "sign-up.php";
        }
    </script>
    <script>
        function scrollPosters(direction) {
            const container = document.getElementById("poster-container");
            const scrollAmount = 300;
            const posters = document.getElementsByClassName("poster-item");
            const activePoster = document.querySelector(".poster-item.active");
            let nextPoster;

            if (direction === "right") {
                nextPoster = activePoster.nextElementSibling;
                if (nextPoster) {
                    container.scrollBy({
                        left: scrollAmount,
                        behavior: "smooth"
                    });
                    activePoster.classList.remove("active");
                    nextPoster.classList.add("active");
                } else {
                    container.scrollTo({
                        left: 0,
                        behavior: "smooth"
                    });
                    activePoster.classList.remove("active");
                    posters[0].classList.add("active");
                }
            } else if (direction === "left") {
                nextPoster = activePoster.previousElementSibling;
                if (nextPoster) {
                    container.scrollBy({
                        left: -scrollAmount,
                        behavior: "smooth"
                    });
                    activePoster.classList.remove("active");
                    nextPoster.classList.add("active");
                } else {
                    container.scrollTo({
                        left: container.scrollWidth,
                        behavior: "smooth"
                    });
                    activePoster.classList.remove("active");
                    posters[posters.length - 1].classList.add("active");
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            const posters = document.getElementsByClassName("poster-item");
            posters[0].classList.add("active");
        });
    </script>
</head>

<body>
    <?php include("header.php"); ?>

    <?php
    require_once("_mysqlconnection.php");

    // Tüm filmleri seçmek için sorgu
    $sql = "SELECT movie_id, img FROM movies";
    $result = mysqli_query($connection, $sql);

    echo '<div class="container mt-5 ">';
    echo '<div class="container container-sm bg-primary py-4">';
    echo '<h1 class="text-white text-center">Sevilen Filmler</h1>';
    echo '</div>';
    echo '<div id="poster-container" class="poster-container">';
    echo '<div class="mt-5"></div>';

    while ($data = mysqli_fetch_assoc($result)) {
        $movieId = $data['movie_id'];
        $img = $data['img'];

        echo '<div class="poster-item">';
        echo '<a href="moviepage.php?movie_id=' . $movieId . '"><img src="' . $img . '" class="img-fluid" /></a>';
        echo '</div>';
    }

    echo '</div>';
    echo '<div class="navigation-buttons">';
    echo '<button class="btn btn-primary" onclick="scrollPosters(\'left\')">&lsaquo;</button>';
    echo '<button class="btn btn-primary" onclick="scrollPosters(\'right\')">&rsaquo;</button>';
    echo '</div>';
    echo '</div>';
    ?>

    <?php require_once("footer.php"); ?>


</body>

</html>