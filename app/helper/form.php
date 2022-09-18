<?php 

function post($name){
  if(isset($_POST[$name])){
    if(is_array($_POST[$name])){
      return array_map(function($item){
        return htmlspecialchars(trim($item));
      }, $_POST[$name]);
    }
    return htmlspecialchars(trim($_POST[$name]));
  }
}

function get($name){
  if(isset($_GET[$name])){
    if(is_array($_GET[$name])){
      return array_map(function($item){
        return htmlspecialchars(trim($item));
      }, $_GET[$name]);
    }
    return htmlspecialchars(trim($_GET[$name]));
  }
}

function form_control(...$except_these){
  unset($_POST['submit']);
  $data = [];
  $err = false;
  foreach($_POST as $key => $value){
    if(!in_array($key, $except_these) && !post($key)){
      $err = true;
    }else{
      $data[$key] = post($key);
    }
  }
  if($err){
    return false;
  }

  return $data;
}

function upload($files, $id){
  
  $result = [];
  
  foreach($files['error'] as $index => $error){
    if($error == 4){
      $result['error'] = 'Lütfen dosya seçiniz.';
    }elseif($error != 0){
      $result['error'][] = 'Dosya yüklenirken bir hata oluştu #' . $files['name'][$index];
    }
  }

  if(!isset($result['error'])){
    $valid_file_extensions = [
      'image/jpeg',
      'image/png',
      'image/gif'
    ];

    foreach($files['type'] as $index => $type){
      if(!in_array($type, $valid_file_extensions)){
        $result['error'][] = 'Dosya geçersiz bir formata sahip #' . $files['name'][$index];
      }
    }
    if(!isset($result['hata'])){
      $maxSize = (1024 * 1024);
      foreach($files['size'] as $index => $size){
        if($size > $maxSize){
          $result['error'][] = 'Dosya beklenenden büyük #' . $files['name'][$index];
        }
      }
      if(!isset($result['error'])){
        foreach($files['tmp_name'] as $index => $tmp){
          $extension = explode('.', $files['name'][$index]);
          $file_name = uniqid(); 
          $file_name = $file_name . '.' . $extension[1];
          $upload = move_uploaded_file($tmp, PATH . '/upload/' . $id . '-' . $file_name);
          if($upload){
            $result['success'][] = $file_name;
          }else{
            $result['error'][] = 'Resim yüklenemedi #' . $files['name'][$index];
          }
        }
      }
    }
  }
  return $result;
}
