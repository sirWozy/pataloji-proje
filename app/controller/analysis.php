<?php 

if (!permission('analysis', 'show')) {
  permission_page();
}
$totalRecord = $db->from('analysis')
->select('count(analysis_id) as total')
->total();
$pageLimit = (7 * 3);
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$analysis = $db->from('analysis')
->orderby('analysis_id', 'ASC')
->limit($pagination['start'], $pagination['limit'])
->all();

require view('analysis');