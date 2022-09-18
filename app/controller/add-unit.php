<?php

if (!permission('units', 'add')) {
  permission_page();
}

if (post('submit')) {
  $unitName = post('unit_name');
  if (!$unitName) {
    $err = 'Birim adını giriniz.';
  } else {
    $success = 'Ekleme başarılı.';
    $db->insert('units')
      ->set([
        'unit_name' => $unitName
      ]);
      header('Refresh:1,url=' . site_url('units'));
  }
}

require view('add-unit');
