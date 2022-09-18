<?php 

if(!permission('users', 'add')){
  permission_page();
}

if(post('submit')){
  $userName = post('user_name');
  $userPass = password_hash(post('user_pass'), PASSWORD_DEFAULT);
  $userRank = post('user_rank');
  $userUrl = permalink(post('user_name'));
  $userPermissions = json_encode($_POST['user_permissions']);
  if(!$userName){
    $err = 'Kullanıcı adını giriniz.';
  }elseif(!$userPass){
    $err = 'Şifresini giriniz.';
  }else{
    $success = 'Ekleme başarılı.';
    $db->insert('users')
      ->set([
        'user_name' => $userName,
        'user_url' => $userUrl,
        'user_password' => $userPass,
        'user_rank' => $userRank,
        'user_permissions' => $userPermissions
      ]);
  }
}
require view('add-user');