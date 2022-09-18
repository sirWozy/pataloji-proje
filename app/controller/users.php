<?php

if(!permission('users', 'show')){
  permission_page();
}
$totalRecord = $db->from('users')
->select('count(user_id) as total')
->total();
$pageLimit = (7 * 3);
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$users = $db->from('users')
->orderby('user_id', 'ASC')
->limit($pagination['start'], $pagination['limit'])
->all();

require view('users');