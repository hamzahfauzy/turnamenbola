<?php

$where = (empty($where) ? 'WHERE ' : ' AND ') . ' group_id = '.$_GET['id'];

$db->query = "SELECT * FROM $table $where ORDER BY ".$col_order." ".$order[0]['dir']." LIMIT $start,$length";
$data  = $db->exec('all');

$total = $db->exists($table,$where,[
    $col_order => $order[0]['dir']
]);

return compact('data','total');