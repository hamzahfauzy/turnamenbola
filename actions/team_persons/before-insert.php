<?php 

$data = $_POST['team_persons'];

Validation::run([
    'position'      => ['required'],
], $data);

if(isset($_FILES['logo']['name']) && $_FILES['logo']['name']){
    $uploadFile     = do_upload($_FILES['pic_url'], 'img');
    $_POST['team_persons']['pic_url'] = $uploadFile;
}

$person = [
    'id_card_number' => $data['id_card_number'],
    'name' => $data['name'],
    'gender' => $data['gender'],
    'birthdate' => $data['birthdate'],
];

unset($_POST['team_persons']['id_card_number']);
unset($_POST['team_persons']['name']);
unset($_POST['team_persons']['gender']);
unset($_POST['team_persons']['birthdate']);

$person = $db->insert('persons', $person);
$_POST['team_persons']['tournament_id'] = $_GET['tournament_id'];
$_POST['team_persons']['team_id'] = $_GET['team_id'];
$_POST['team_persons']['person_id'] = $person->id;