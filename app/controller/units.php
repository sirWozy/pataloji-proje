<?php 

if (!permission('units', 'show')) {
  permission_page();
}
$totalRecord = $db->from('units')
->select('count(unit_id) as total')
->total();
$pageLimit = (7 * 3);
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$units = $db->from('units')
->orderby('unit_id', 'ASC')
->limit($pagination['start'], $pagination['limit'])
->all();

require view('units');