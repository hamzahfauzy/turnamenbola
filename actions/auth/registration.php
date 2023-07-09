<?php

if(request() == 'POST')
{
    $conn  = conn();
    $db    = new Database($conn);

    // create user login
    $_POST['users']['name']     = $_POST['name'];
    $_POST['users']['username'] = $_POST['username'];
    $_POST['users']['password'] = md5($_POST['password']);

    $user = $db->insert('users',$_POST['users']);


    // assign role to user
    if($_POST['jenis_user'] == "team"){
        $db->insert('user_roles',[
            'user_id' => $user->id,
            'role_id' => 3
        ]);
    }else{
        $db->insert('user_roles',[
            'user_id' => $user->id,
            'role_id' => 2
        ]);
    }

    set_flash_msg(['success'=>'Perndaftaran Berhasil']);
    header('location:'.routeTo('auth/login'));
    die();

}