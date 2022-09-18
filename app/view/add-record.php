<?php require view('static/header'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card shadow p-5">
          <div class="card-header border-0">
            <h3 class="mb-2">Kayıt Ekle</h3>
          </div>
          <form action="" method="POST">
            <div class="row justify-content-md-center">
              <div class="col-md-12">
                <h4>Merkezi Protokol</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="central_protocol" placeholder="Merkezi Protokol">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Geldiği Yer - Birim</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="unit">
                    <option value="">Geldiği Yer - Birim</option>
                    <?php foreach ($units as $unit) : ?>
                      <option value="<?= $unit['unit_id'] ?>"><?= $unit['unit_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>Hayvan Türü</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="animal_type" placeholder="Hayvan Türü">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Irk</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="race" placeholder="Irk">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Yaş</h4>
                <div class="form-group">
                  <input type="number" class="form-control form-control-alternative" name="age" placeholder="Yaş">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Cinsiyet</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="gender">
                    <option value="Erkek">Erkek</option>
                    <option value="Dişi">Dişi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>İstenilen Analiz</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="analysis">
                    <option value="">İstenilen Analiz</option>
                    <?php foreach ($analysis as $analysis_odd) : ?>
                      <option value="<?= $analysis_odd['analysis_id'] ?>"><?= $analysis_odd['analysis_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>Sorumlu Personel</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="staff" placeholder="Sorumlu Personel">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Tanı</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="diagnosis" placeholder="Tanı">
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
                  <button name="submit" value="1" type="submit" class="btn btn-primary my-4">Ekle</button>
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