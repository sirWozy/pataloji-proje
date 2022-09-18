<?php 

if (!permission('units', 'edit')) {
  permission_page();
}

$id = get('id');

$row = $db->from('units')
  ->where('unit_id', $id)
  ->all();

if (post('submit')) {
  $unitName = post('unit_name');
  if (!$unitName) {
    $err = "Birim adını giriniz.";
  } else {
    $success = "Düzenleme başarılı.";
    $query = $db->update('units')
      ->where('unit_id', $id)
      ->set([
        'unit_name' => $unitName
      ]);
      header('Refresh:1,url=' . site_url('units'));
  }
}

require view('edit-unit');