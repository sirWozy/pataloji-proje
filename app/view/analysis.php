<?php require view('static/header'); ?>

<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
  <div class="container-fluid">
    <!-- Table -->
    <div class="row">
      <div class="col">
        <div class="card shadow">
          <div class="card-header border-0">
            <h3 class="mb-0">Kullanıcı Listesi</h3>
          </div>
          <div class="table-responsive">
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="text-center"></th>
                  <th scope="col" class="text-center">Birim Adı</th>
                  <?php if (permission('users', 'edit') && permission('users', 'delete')) : ?>
                    <th scope="col" class="text-center">İşlem</th>
                  <?php endif; ?>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($analysis)) : ?>
                  <?php foreach ($analysis as $analysis_odd) : ?>
                    <tr>
                      <td scope="row" class="text-center">
                        <?= $analysis_odd['analysis_id'] ?>
                      </td>
                      <td scope="row" class="text-center">
                        <?= $analysis_odd['analysis_name'] ?>
                      </td>
                      <?php if (permission('analysis', 'edit') && permission('analysis', 'delete')) : ?>
                        <td class="text-center">
                          <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                              <?php if (permission('analysis', 'edit')) : ?>
                                <a class="dropdown-item" href="<?= site_url('edit-analysis?id=' . $analysis_odd['analysis_id']) ?>">
                                  <i class="ni ni-ruler-pencil text-yellow"></i>
                                  Düzenle
                                </a>
                              <?php endif; ?>
                              <?php if (permission('analysis', 'delete')) : ?>
                                <a class="dropdown-item" onclick="confirm('Silme işlemine devam etmek istiyor musunuz?')" href="<?= site_url('delete?tableName=analysis&redirect=analysis&columnName=analysis_id&id=' . $analysis_odd['analysis_id']) ?>">
                                  <i class="ni ni-fat-remove text-danger"></i>
                                  Sil
                                </a>
                              <?php endif; ?>
                            </div>
                          </div>
                        </td>
                      <?php endif; ?>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
          <div class="card-footer py-4">
            <?php if ($totalRecord > $pageLimit) : ?>
              <nav aria-label="...">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item disabled">
                    <a class="page-link" href="<?= site_url('analysis?' . $pageParam . '=' . $db->prevPage()) ?>" tabindex="-1">
                      <i class="fas fa-angle-left"></i>
                      <span class="sr-only">Previous</span>
                    </a>
                  </li>
                  <?= $db->showPagination(site_url('analysis?' . $pageParam . '=[page]')) ?>
                  <li class="page-item">
                    <a class="page-link" href="<?= site_url('analysis?' . $pageParam . '=' . $db->nextPage()) ?>">
                      <i class="fas fa-angle-right"></i>
                      <span class="sr-only">Next</span>
                    </a>
                  </li>
                </ul>
              </nav>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require view('static/footer'); ?>