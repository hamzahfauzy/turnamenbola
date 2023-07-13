<?php

$conn = conn();
$db   = new Database($conn);

$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$next = date('Y-m-d', strtotime('+1 day', strtotime($date)));
$prev = date('Y-m-d', strtotime('-1 day', strtotime($date)));
$isToday = date('Y-m-d') == $date;

// tournaments
$tournaments = $db->all('tournaments');

$tournaments = array_map(function($tournament) use ($db, $date){
    $matches = $db->all('tournament_matches', [
        'tournament_id' => $tournament->id,
        'schedule_at' => ['LIKE','%'.$date.'%']
    ]);

    $tournament->matches = array_map(function($match) use ($db){
        $match->home = $db->single('teams',['id'=>$match->team_home_id]);
        $match->away = $db->single('teams',['id'=>$match->team_away_id]);
        return $match;
    }, $matches);
    return $tournament;
}, $tournaments);

return compact('date','next','prev','isToday','tournaments');