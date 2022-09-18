<?php

if (!permission('records', 'add')) {
  permission_page();
}

$units = $db->from('units')
  ->all();

$analysis = $db->from('analysis')
  ->all();

if (post('submit')) {
  $centralProtocol = post('central_protocol');
  $unitID = post('unit');
  $animalType = post('animal_type');
  $race = post('race');
  $age = post('age');
  $gender = post('gender');
  $analysisID = post('analysis');
  $staff = post('staff');
  $diagnosis = post('diagnosis');
  if (!$centralProtocol) {
    $err = 'Merkezi protokolü giriniz.';
  }elseif(!$unitID){
    $err = 'Birim seçiniz.';
  } elseif(!$animalType){
    $err = 'Hayvan türünü giriniz.';
  }elseif(!$race){
    $err = 'Irkı giriniz.';
  }elseif(!$age){
    $err = 'Yaşı giriniz.';
  }elseif(!$gender){
    $err = 'Cinsiyeti seçiniz.';
  }elseif(!$analysisID){
    $err = 'Analiz seçiniz.';
  }elseif(!$staff){
    $err = 'Sorumlu personeli giriniz.';
  }elseif(!$diagnosis){
    $err = 'Tanıyı giriniz.';
  }else {
    $success = 'Ekleme başarılı.';
    $db->insert('records')
      ->set([
        'record_central_protocol' => $centralProtocol,
        'unit_id' => $unitID,
        'animal_type' => $animalType,
        'record_race' => $race,
        'record_age' => $age,
        'record_gender' => $gender,
        'analysis_id' => $analysisID,
        'record_staff' => $staff,
        'record_diagnosis' => $diagnosis
      ]);
    header('Refresh:1,url=' . site_url('records'));
  }
}

require view('add-record');
