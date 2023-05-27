<?php
require_once("logout.php");
?>

<header class="p-3 text-bg-primary">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
      <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        <img src="logo.png" alt="Logo" width="250" height="40" class="me-2">
      </a>
      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 text-white">Anasayfa</a></li>
        <li><a href="topmovies.php" class="nav-link px-2 text-white">Top Film</a></li>
        <li><a href="#com" class="nav-link px-2 text-white">İletişim</a></li>
        <li><a href="#hk" class="nav-link px-2 text-white">Hakkımızda</a></li>
      </ul>

      <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" name="search" action="search.php" method="GET">
  <input type="search" class="form-control form-control-primary text-bg-primary" placeholder="Ara..." aria-label="Search" name="search">
</form>

      <?php
      // Session kontrolü
      if (isset($_SESSION['username'])) {
        // Kullanıcı oturum açmışsa burası çalışacak
        echo '
      <div class="dropdown text-end ">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="mdo" width="32" height="32" class="rounded-circle">
        </a>
        <ul class="dropdown-menu text-small bg-warning" name>
          <li><a class="dropdown-item" href="profile.php">Profil</a></li>
          <li><a class="dropdown-item" href="mymovielist.php">Film Listem</a></li>
          <li><hr class="dropdown-divider"></li>
          <form method="post">
        <button type="submit" class="dropdown-item" name="signout">Oturumu Kapat</button>
        </form>
        </ul>
      </div>
      ';
      } else {
        // Kullanıcı oturum açmamışsa burası çalışacak
        echo '
      <div class="text-end">
        <button type="button" class="btn btn-outline-light me-2" onclick="openSignInPage()">Giriş Yap</button>
        <button type="button" class="btn btn-warning" onclick="openSignUpPage()">Kaydol</button>
      </div>
      ';
      }
      ?>

    </div>
  </div>
</header>