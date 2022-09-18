<?php 

if (!permission('analysis', 'edit')) {
  permission_page();
}

$id = get('id');

$row = $db->from('analysis')
  ->where('analysis_id', $id)
  ->all();

if (post('submit')) {
  $analysisName = post('analysis_name');
  if (!$analysisName) {
    $err = "Analiz adını giriniz.";
  } else {
    $success = "Düzenleme başarılı.";
    $query = $db->update('analysis')
      ->where('analysis_id', $id)
      ->set([
        'analysis_name' => $analysisName
      ]);
      header('Refresh:1,url=' . site_url('analysis'));
  }
}

require view('edit-analysis');