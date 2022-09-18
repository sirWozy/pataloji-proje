<!--

=========================================================
* Argon Dashboard - v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2019 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>
    Mindimex | Giriş Yap
  </title>
  <!-- Favicon -->
  <link href="<?= public_url('img/brand/favicon.png'); ?>" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="<?= public_url('js/plugins/nucleo/css/nucleo.css'); ?>" rel="stylesheet" />
  <link href="<?= public_url('js/plugins/@fortawesome/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" />
  <!-- CSS Files -->
  <link href="<?= public_url('css/argon-dashboard.css?v=1.1.0'); ?>" rel="stylesheet" />
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center">
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-header bg-transparent">
              <div class="text-muted text-center"><h3>Giriş Yap</h3></div>
            </div>
            <div class="card-body px-lg-5 py-lg-5">
              <form action="" method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" placeholder="Kullanıcı Adınız" type="text" name="user-name">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Şifreniz" type="password" name="user-pass">
                    <input type="hidden" value="1" name="submit">
                  </div>
                </div>
                <?php if(isset($err)): ?> 
                <div class="alert alert-danger">
                  <?= $err ?>
                </div>
                <?php endif; ?>
                <?php if(isset($success)): ?> 
                <div class="alert alert-success">
                  <?= $success ?>
                </div>
                <?php endif; ?>
                <div class="text-center">
                  <input type="submit" class="btn btn-primary my-4" value="Giriş Yap">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--   Core   -->
  <script src="<?= public_url('js/plugins/jquery/dist/jquery.min.js') ?>"></script>
  <script src="<?= public_url('js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
  <!--   Optional JS   -->
  <!--   Argon JS   -->
  <script src="<?= public_url('js/argon-dashboard.min.js?v=1.1.0') ?>"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
</body>

</html>