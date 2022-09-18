<?php 


if(post('submit')){
  $user_name = post('user-name');
  $password = post('user-pass');
  if(!$user_name){
    $err = "Kullanıcı adınınızı girin";
  }elseif(!$password){
    $err = "Şifrenizi girin.";
  }else{
    $query = $db->from('users')
      ->where('user_name', $user_name)
      ->all();
    if($query){
      foreach($query as $row){
        $password_verify = password_verify($password, $row['user_password']);
        if($password_verify){
          $success = 'Giriş Başarılı. Yönlendiriliyorsunuz.';
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['user_name'] = $row['user_name'];
          $_SESSION['user_rank'] = $row['user_rank'];
          $_SESSION['user_permissions'] = $row['user_permissions'];
          $_SESSION['login'] = true;
          header('Refresh:1,url=' . site_url());
        }else{
          $err = 'Şifreniz hatalı!';
        }
      }
    }else{
      $err = 'Böyle bir kullanıcı yok.';
    }
  }
}


require view('login');