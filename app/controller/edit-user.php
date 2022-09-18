<?php

if (!permission('users', 'edit')) {
  permission_page();
}

$id = get('id');

$row = $db->from('users')
  ->where('user_id', $id)
  ->all();


$permissions = json_decode($row[0]['user_permissions'], true);

if (post('submit')) {
  $userName = post('user_name');
  $userPass = post('user_pass');
  $userRank = post('user_rank');
  $userUrl = permalink(post('user_name'));
  $userPermissions = json_encode($_POST['user_permissions']);
  if (!$userName) {
    $err = "Kullanıcı adını giriniz.";
  } elseif (!$userPass) {
    $err = "Şifrenizi giriniz.";
  } else {
    $userPass = password_hash($userPass, PASSWORD_DEFAULT);
    $success = "Düzenleme başarılı.";
    $query = $db->update('users')
      ->where('user_id', $id)
      ->set([
        'user_name' => $userName,
        'user_password' => $userPass,
        'user_url' => $userUrl,
        'user_rank' => $userRank,
        'user_permissions' => $userPermissions
      ]);
  }
}

require view('edit-user');
