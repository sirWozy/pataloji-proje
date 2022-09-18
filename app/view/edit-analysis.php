<?php require view('static/header'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card shadow p-5">
          <div class="card-header border-0">
            <h3 class="mb-2">Analiz Düzenle</h3>
          </div>
          <form action="" method="POST">
            <div class="row justify-content-md-center">
              <div class="col-md-12">
                <h4>Analiz Adı</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="analysis_name" placeholder="Analiz Adı" value="<?= post('analysis_name') ? post('analysis_name') : $row[0]['analysis_name'] ?>">
                </div>
              </div>
              <?php if (isset($err)) : ?>
                <div class="col-md-12">
                  <div class="alert alert-danger">
                    <i class="ni ni-fat-remove text-danger"></i>
                    <?= $err ?>
                  </div>
                </div>
              <?php endif; ?>
              <?php if (isset($success)) : ?>
                <div class="col-md-12">
                  <div class="alert alert-success">
                    <i class="ni ni-check-bold text-success"></i>
                    <?= $success ?>
                  </div>
                </div>
              <?php endif; ?>
              <div class="col-md-12">
                <div class="form-group">
                  <button name="submit" value="1" type="submit" class="btn btn-primary my-4">Düzenle</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require view('static/footer') ?>