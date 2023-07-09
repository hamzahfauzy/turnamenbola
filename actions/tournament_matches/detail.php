<?php 

$conn   = conn();
$db     = new Database($conn);
$id     = $_GET['id'];

$db->query = ("SELECT tournament_matches.*, tournaments.name nama_turnamen, team_home.name AS team_home, team_away.name AS team_away, tournament_group.name nama_grup
                FROM tournament_matches 
                JOIN tournaments ON tournament_matches.tournament_id = tournaments.id
                JOIN teams as team_home ON tournament_matches.team_home_id = team_home.id
                JOIN teams as team_away ON tournament_matches.team_away_id= team_away.id
                JOIN tournament_group ON tournament_matches.group_id = tournament_group.id
                WHERE tournament_matches.id = $id
                
                ");

$data = $db->exec("single");

$db->query = ("SELECT * FROM persons");
$persons = $db->exec("all");

$db->query = ("SELECT * FROM teams");
$teams = $db->exec("all");

if(request() == 'POST')
{
      
        // echo '<pre>';
        // print_r($_POST);
        // die;
$db->insert('tournament_stats',[
    'tournament_id' => $_POST['tournament_id'],
    'match_id'      => $_POST['match_id'],
    'person_id'     => $_POST['person_id'],
    'team_id'       => $_POST['team_id'],
    'stats_type'    => $_POST['stats_type']

]);
           
  
    set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
    header('location:'.routeTo('crud/index?table=tournament_matches'));
}


return compact('data', 'persons', 'teams');



?>