<?php 

$data = $_POST['team_persons'];

Validation::run([
    'position'      => ['required'],
], $data);

if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']){
    $uploadFile     = do_upload($_FILES['pic_url'], 'img');
    $_POST['team_persons']['pic_url'] = $uploadFile;
}