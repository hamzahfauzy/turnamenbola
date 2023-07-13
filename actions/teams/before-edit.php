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
