<?php 

$data = $_POST['tournaments'];

Validation::run([
    'name'          => ['required'],
    'description'   => ['required'],
], $data);

$conn = conn();
$db   = new Database($conn);

// Insert user role
$_POST['user_roles']['user_id'] = auth()->user->id;
$_POST['user_roles']['role_id'] = 2;
$db->insert('user_roles',$_POST['user_roles']);

// Insert teachers
$_POST['tournaments']['user_id'] = auth()->user->id;



?>