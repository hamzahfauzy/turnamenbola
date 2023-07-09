<?php 

$data = $_POST['teams'];

Validation::run([
    'name'      => ['required'],
    'address'   => ['required'],
    'phone'     => ['required'],
], $data);

if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']){
    $uploadFile     = do_upload($_FILES['logo'], 'img');
    $_POST['teams']['logo'] = $uploadFile;
}


$conn = conn();
$db   = new Database($conn);

// Insert user role
$_POST['user_roles']['user_id'] = auth()->user->id;
$_POST['user_roles']['role_id'] = 3;
$db->insert('user_roles',$_POST['user_roles']);

// Insert teams
$_POST['teams']['user_id'] = auth()->user->id;



?>