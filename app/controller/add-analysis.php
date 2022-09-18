<?php

if (!permission('analysis', 'add')) {
  permission_page();
}

if (post('submit')) {
  $analysisName = post('analysis_name');
  if (!$analysisName) {
    $err = 'Birim adını giriniz.';
  } else {
    $success = 'Ekleme başarılı.';
    $db->insert('analysis')
      ->set([
        'analysis_name' => $analysisName
      ]);
      header('Refresh:1,url=' . site_url('analysis'));
  }
}

require view('add-analysis');
