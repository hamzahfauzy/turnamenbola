<?php
$table = 'team_persons';
Page::set_title('Tambah Skuad');



if(request() == 'POST')
{
    $conn = conn();
    $db   = new Database($conn);
    
    extract($_POST);
   
    $user_id = auth()->user->id;
    $db->query = ("SELECT team_tournaments.*, teams.id team_id, teams.user_id
                        FROM team_tournaments 
                        JOIN teams ON team_tournaments.team_id = teams.id
                        WHERE team_tournaments.status = 'Verified'
                        AND teams.user_id = $user_id ");

    $team_tournament = $db->exec('single');

    // $pic_url = "";
    if(isset($_FILES['pic_url']['name']) && $_FILES['pic_url']['name']){
        $pic_url     = do_upload($_FILES['pic_url'], 'img');
    }
    
    // $id_card_pic = "";
    if(isset($_FILES['id_card_pic']['name']) && $_FILES['id_card_pic']['name']) {
        $id_card_pic    = do_upload($_FILES['id_card_pic'], 'img');   
    }
    
    $dataPersons = [
        'id_card_number'    => $id_card_number,
        'name'              => $name,
        'gender'            => $gender,
        'address'           => $address,
        'birthdate'         => $birthdate,
        'phone'             => $phone,
        'pic_url'           => $pic_url,
        'id_card_pic'       => $id_card_pic  
    ];
    
    $id = $db->insert('persons',$dataPersons);
    
    $dataTeamPerson = [
        'team_id'           => $team_tournament->team_id,
        'person_id'         => $id->id,
        'tournament_id'     => $team_tournament->id,
        'pic_url'           => $pic_url,
        'position'          => $position

    ];
    $db->insert('team_persons',$dataTeamPerson);

    set_flash_msg(['success'=>'Skuad Team berhasil ditambahkan']);
    header('location:'.routeTo('teams/index'));
}