<?php
$table = 'teams';
Page::set_title('Tambah Team');



if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);
    
    if(file_exists('../actions/'.$table.'/before-insert.php'))
        require '../actions/'.$table.'/before-insert.php';

    // echo '<pre>';
    // print_r($_POST);
    // print_r($_FILES);
    // die;
    $db->insert('teams',$_POST['teams']);

    set_flash_msg(['success'=>'Team berhasil ditambahkan']);
    header('location:'.routeTo('teams/index'));
}