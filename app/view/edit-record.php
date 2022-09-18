<?php require view('static/header'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card shadow p-5">
          <div class="card-header border-0">
            <h3 class="mb-2">Kayıt Düzenle</h3>
          </div>
          <form action="" method="POST">
            <div class="row justify-content-md-center">
              <div class="col-md-12">
                <h4>Merkezi Protokol</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="central_protocol" placeholder="Merkezi Protokol" value="<?= post('central_protocol') ? post('central_protocol') : $row[0]['record_central_protocol']?>">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Geldiği Yer - Birim</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="unit">
                    <option value="">Geldiği Yer - Birim</option>
                    <?php foreach ($units as $unit) : ?>
                      <option <?= post('unit') || $row[0]['unit_id'] == $unit['unit_id'] ? ' selected ' : null ?> value="<?= $unit['unit_id'] ?>"><?= $unit['unit_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>Hayvan Türü</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="animal_type" placeholder="Hayvan Türü" value="<?= post('animal_type') ? post('animal_type') : $row[0]['animal_type']?>">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Irk</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="race" placeholder="Irk" value="<?= post('race') ? post('race') : $row[0]['record_race']?>">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Yaş</h4>
                <div class="form-group">
                  <input type="number" class="form-control form-control-alternative" name="age" placeholder="Yaş" value="<?= post('age') ? post('age') : $row[0]['record_age']?>">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Cinsiyet</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="gender">
                    <option <?= post('gender') == 'Erkek' || $row[0]['record_gender'] == 'Erkek' ? ' selected ' : null ?> value="Erkek">Erkek</option>
                    <option <?= post('gender') == 'Dişi' || $row[0]['record_gender'] == 'Dişi' ? ' selected ' : null ?> value="Dişi">Dişi</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>İstenilen Analiz</h4>
                <div class="form-group">
                  <select class="form-control form-control-alternative" name="analysis">
                    <option value="">İstenilen Analiz</option>
                    <?php foreach ($analysis as $analysis_odd) : ?>
                      <option <?= post('analysis') || $row[0]['analysis_id'] == $analysis_odd['analysis_id'] ? ' selected ' : null ?> value="<?= $analysis_odd['analysis_id'] ?>"><?= $analysis_odd['analysis_name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>Sorumlu Personel</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="staff" placeholder="Sorumlu Personel" value="<?= post('staff') ? post('staff') : $row[0]['record_staff']?>">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Tanı</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="diagnosis" placeholder="Tanı" value="<?= post('diagnosis') ? post('diagnosis') : $row[0]['record_diagnosis']?>">
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