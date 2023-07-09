<?php

$conn = conn();
$db   = new Database($conn);

$db->delete('teams',[
    'id' => $_GET['id']
]);

set_flash_msg(['success'=>'Team berhasil dihapus']);
header('location:'.routeTo('teams/index'));
die();