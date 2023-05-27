<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Watchopedia</title>
  <link href="bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap.bundle.min.js"></script>
  <script>
    //kaydol ve giriş butonları
    function openSignInPage() {
      window.location.href = "sign-in.php";
    }

    function openSignUpPage() {
      window.location.href = "sign-up.php";
    }
  </script>

</head>

<body>
  <?php include("header.php"); ?>
  <?php require_once("getsaccountsdata.php"); ?>
  <?php require_once("countmymovies.php"); ?>
  <?php require_once("avaragemyscore.php"); ?>
  <section style="background-color: #eee;">
    <div class="container py-5">

      <div class="row">
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body text-center">
              <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_960_720.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
              <h5 class="my-3"><?php echo $firstname . " " . $lastname; ?></h5>
              <p class="text-muted mb-1"><?php echo $username; ?></p>
              <p class="text-muted mb-4"><?php if ($usermode == 1) echo "YÖNETİCİ";
                                          else echo "KULLANICI"; ?></p>
              <?php if ($usermode == 1) {
                echo '<div class="d-flex justify-content-center mb-2">
              <a href="addmovie.php"><button type="button" class="btn btn-primary">Film Ekle</button></a>
          </div>';
              } ?>

            </div>
          </div>

          <div class="card mb-4 mb-lg-0 py-5">
            <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fas fa-globe fa-lg" style="color: #333333;">Listene Eklediğin Film Sayısı:</i>
                  <p class="mb-0"><?php echo $count; ?></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;">Ortalama Puanım:</i>
                  <p class="mb-0"><?php echo $average_score; ?></p>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                  <i class="fab fa-github fa-lg" style="color: #333333;">Ortalama Puanım:</i>
                  <div class="d-flex justify-content-center mb-2">
                <a href="deleteprofile.php"><button type="button" class="btn btn-primary">Profil Sil</button></a>
              </div>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <form action="editprofile.php" method="POST">
                <div class="row mb-3">
                  <div class="col-sm-3">
                    Ad
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    Soyad
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    E-posta
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    Kullanıcı Adı
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    Doğum Tarihi
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="birtdate" value="<?php echo $birthdate; ?>">
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-sm-3">
                    Parola
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" class="form-control" name="password" value="********">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <input type="submit" class="btn btn-primary px-4" value="Kaydet">
                  </div>
              </form>
            </div>
          </div>
        </div>

        <div class="row py-5">
          <div class="col-md-12">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <h5 class="card-title">Hakkımda</h5>
                <hr>
                <form action="editdescription.php" method="POST">
                  <div class="form-group">
                    <textarea class="form-control" id="aboutTextArea" name="description" rows="5" placeholder="<?php echo $description; ?>"></textarea>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <input type="submit" class="btn btn-info" value="Kaydet">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    </div>
  </section>
  <?php require_once("footer.php"); ?>
</body>

</html>