<?php

$conn = conn();
$db   = new Database($conn);
Page::set_title('Edit Team');
$data = $db->single('teams',[
    'id' => $_GET['id']
]);

if(request() == 'POST')
{
    $db->update('teams',$_POST['teams'],[
        'id' => $_GET['id']
    ]);

    set_flash_msg(['success'=>'Team berhasil diupdate']);
    header('location:'.routeTo('teams/index'));
}

return [
    'data' => $data
];