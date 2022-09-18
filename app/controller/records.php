<?php 

if (!permission('records', 'show')) {
  permission_page();
}
$totalRecord = $db->from('records')
->select('count(record_id) as total')
->total();
$pageLimit = (7 * 3);
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$records = $db->from('records')
->join('units', 'records.unit_id = units.unit_id')
->join('analysis', 'records.analysis_id = analysis.analysis_id')
->orderby('record_id', 'ASC')
->limit($pagination['start'], $pagination['limit'])
->all();

require view('records');