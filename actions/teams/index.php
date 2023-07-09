<?php

$conn = conn();
$db   = new Database($conn);
$success_msg = get_flash_msg('success');
Page::set_title('Data Teams');
$user_id = auth()->user->id;

if($user_id == 1){
    $datas = $db->all('teams');
}else{
    $db->query = ("SELECT * FROM teams where teams.user_id = $user_id");
    $datas = $db->exec("all");

}
$user_id = auth()->user->id;

$db->query = ("SELECT team_tournaments.*, teams.id team_id, teams.user_id
                    FROM team_tournaments 
                    JOIN teams ON team_tournaments.team_id = teams.id
                    WHERE team_tournaments.status = 'Verified'
                    AND teams.user_id = $user_id ");

$team_tournament = $db->exec('single');

return compact('datas','success_msg', 'team_tournament');