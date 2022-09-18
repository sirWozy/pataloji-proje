<?php 

session_start();

ob_start();

function loadClasses($className){
  require __DIR__ . '/classes/' . strtolower($className) . '.php';
}

spl_autoload_register('loadClasses');

$config = require __DIR__ . '/config.php';

try{
  $db = new BasicDB($config['db']['host'], $config['db']['name'], $config['db']['user'], $config['db']['pass']);
}catch(PDOException $e){  
  die($e->getMessage());
}

// TOKEN
/*if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(!isset($_POST['token']) || $_POST['token'] != $_SERVER['token']){
    die('Geçersiz CSRF token!');
  }
}

$_SESSION['token'] = bin2hex(random_bytes(20));*/


// AUTO LOAD HELPER
foreach(glob(__DIR__ . '/helper/*.php') as $helperFile){
  require $helperFile;
}
