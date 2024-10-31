<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SINKRON | Login Page</title>
  <link rel="stylesheet" href="assets/css/login.css?t=<?= rand(); ?>" />
  <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
  <link rel="shortcut icon" href="assets/img/logo.png" type="image/png">
</head>

<body>
  <div id="tsparticles"></div>
  <section
    class="login-panel d-flex align-items-center justify-content-center">
    <div class="container-fluid d-flex p-0">
      <div class="row">
        <div
          class="col-4 d-flex justify-content-center align-items-center ps-5">
          <img
            src="assets/img/logo-deli-serdang.jpg"
            alt="logo-deli-serdang"
            width="100%" />
        </div>
        <div class="col-8">
          <?php
          if (isset($_POST['login'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : 0;
            $password = isset($_POST['password']) ? $_POST['password'] : 0;
            $notif = "Silahkan masukkan data yang benar!";

            if (!empty($email)) {
              require_once __DIR__ . "/class/Databases.php";
              require_once __DIR__ . "/class/Cheat.php";
              $sql = new Databases();
              $cheat = new Cheat();

              if ($sql->count("SELECT * FROM akun WHERE akun_email='$email'") == 1) {
                $data = $sql->fetch("SELECT * FROM akun WHERE akun_email='$email'");
                if (password_verify($password, $data['akun_password'])) {
                  session_start();
                  $_SESSION['ses_mail'] = $email;
                  $_SESSION['ses_pass'] = $password;

                  $segmen = 0;


                  if ($data['akun_level'] == 'admin' && $data['akun_segmen'] == 'semua') {
                    $segmen = 'admin';
                  } else if ($data['akun_level'] == 'viewer' && $data['akun_segmen'] == 'semua') {
                    $segmen = 'viewer';
                  } else if ($data['akun_level'] == 'operator') {
                    $segmen = 'operator';
                  }

                  if (!empty($segmen)) {
                    $cheat->log($data['akun_id'], "login", "User Login Success as [$segmen]");
                    header("Location: segmen/index.php");
                  }
                }
              }
            }
            echo "<div class='notification'>
  <span class='delete'></span>
  $notif
  </div>";
          }
          ?>

          <!-- <form action="" method="post">
            <div class="row">
              <div class="col p-5 gap-3 d-flex flex-column">
                <h3>SINKRON</h3>
                <input
                  type="email"
                  name="email"
                  id="email"
                  class="form-control"
                  placeholder="Masukkan Email.." />
                <input
                  type="password"
                  name="password"
                  id="password"
                  class="form-control"
                  placeholder="Masukkan Password.." />
                <button type="submit" class="btn btn-primary">Masuk</button>
              </div>
            </div>
          </form> -->
          <form action="" method="post" class="px-4">
            <div class="container login_body">
              <h3>SINKRON</h3>
              <div class="field">
                <label class="label">Email</label>
                <div class="control">
                  <input name="email" type="email" class="form-control">
                </div>
              </div>

              <div class="field">
                <label class="label">Password</label>
                <div class="control">
                  <input name="password" type="password" class="form-control">
                </div>
              </div>
            </div>
            <div class="login_footer mt-3 container">
              <div class="field has-text-right">
                <button name="login" type="submit" class="btn btn-primary">Masuk</button>
                <p>Versi 1.0.0 <i class="text-primary">lupa password?</i></p>

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/tsparticles/3.1.0/tsparticles.bundle.min.js"
    integrity="sha512-Pv/x9J11LpAF+KsoMoLjZZbVK03G63ZDN/GhJrhu8bP5sZO3VHzQ1XbfuU/+wubUB00sNnMAIEM3l/PMVUlKjQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="assets/js/particle.js"></script>
</body>

</html>
s