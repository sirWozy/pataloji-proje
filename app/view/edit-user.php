<?php require view('static/header'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <div class="card shadow p-5">
          <div class="card-header border-0">
            <h3 class="mb-2">Kullanıcı Düzenle</h3>
          </div>
          <form action="" method="POST">
            <div class="row justify-content-md-center">
              <div class="col-md-12">
                <h4>Kullanıcı Adı</h4>
                <div class="form-group">
                  <input type="text" class="form-control form-control-alternative" name="user_name" placeholder="Kullanıcı Adı" value='<?= post('user_name') ? post('user_name') : $row[0]['user_name'] ?>'>
                </div>
              </div>
              <div class="col-md-12">
                <h4>Kullanıcı Şifresi</h4>
                <div class="form-group">
                  <input type="password" class="form-control form-control-alternative" name="user_pass" placeholder="Kullanıcı Şifresi">
                </div>
              </div>
              <div class="col-md-12">
                <h4>Kullanıcı Rütbesi</h4>
                <div class="form-group">
                  <select name="user_rank" class="form-control form-control-alternative">
                    <option value="">Kullanıcı Rütbesi</option>
                    <?php foreach (user_ranks() as $id => $rank) : ?>
                      <option <?= post('user_rank') == $id || $row[0]['user_rank'] == $id ? 'selected' : null ?> value="<?= $id ?>"><?= $rank ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <h4>İzinler</h4>
                <div class="col-md-6">
                  <?php foreach ($menus as $url => $menu) : ?>
                    <div class="row p-2 mt-3" style="box-shadow: 0 1px 3px rgba(50, 50, 93, 0.15), 0 1px 0 rgba(0, 0, 0, 0.02);border-radius: 0.375rem;">
                      <div class="col-md-6 d-flex align-items-center">
                        <h4><?= $menu['title'] ?></h4>
                      </div>
                      <div class="col-md-6">
                        <?php foreach($menu['permissions'] as $key => $value): ?>
                        <div class="custom-control custom-checkbox mt-3 mb-3">
                          <input class="custom-control-input" <?= (isset($permissions[$url][$key]) && $permissions[$url][$key] == 1 ? ' checked' : null) ?> name="user_permissions[<?= $url ?>][<?= $key ?>]" id="<?= $menu['title'] . '.' .  $key ?>" value="1" type="checkbox">
                          <label class="custom-control-label" for="<?= $menu['title'] . '.' .  $key ?>"><?= $value ?></label>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                  <?php endforeach; ?>
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