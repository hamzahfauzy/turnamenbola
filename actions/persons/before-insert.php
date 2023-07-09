<?php 

$data = $_POST['persons'];

Validation::run([
    'name'      => ['required'],
    'gender'    => ['required'],
    'birthdate' => ['required'],
], $data);

if(isset($_FILES['name']['pic_url']) && !empty($_FILES['name']['pic_url'])){
    $uploadFile     = do_upload($_FILES['pic_url'], 'img');
    $_POST['persons']['pic_url']     = $uploadFile;
}

if(isset($_FILES['name']['id_card_pic']) && !empty($_FILES['name']['id_card_pic']) ){
    $uploadFile2    = do_upload($_FILES['id_card_pic'], 'img');   
    $_POST['persons']['id_card_pic'] = $uploadFile2;
}
