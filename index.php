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
      class="login-panel d-flex align-items-center justify-content-center"
    >
      <div class="container-fluid d-flex p-0">
        <div class="row">
          <div
            class="col-4 d-flex justify-content-center align-items-center ps-5"
          >
            <img
              src="assets/img/logo-deli-serdang.jpg"
              alt="logo-deli-serdang"
              width="100%"
            />
          </div>
          <div class="col-8">
            <form action="" method="post">
              <div class="row">
                <div class="col p-5 gap-3 d-flex flex-column">
                  <h3>SINKRON</h3>
                  <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    placeholder="Masukkan Email.."
                  />
                  <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    placeholder="Masukkan Password.."
                  />
                  <button type="submit" class="btn btn-primary">Masuk</button>
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
      referrerpolicy="no-referrer"
    ></script>
    <script src="assets/js/particle.js"></script>
  </body>
</html>
s
