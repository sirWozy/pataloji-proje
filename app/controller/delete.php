<?php

$tableName = get('tableName');
$columnName = get('columnName');
$id = get('id');
$redirect = get('redirect');

if(!permission($tableName, 'delete')){
  permission_page();
}

$db->delete($tableName)
  ->where($columnName, $id)
  ->done();

header('Location:' . site_url($redirect));
