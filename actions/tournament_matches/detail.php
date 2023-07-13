<?php

$conn   = conn();
$db     = new Database($conn);
$id     = $_GET['id'];

$db->query = ("SELECT 
                    tournament_matches.*, 
                    tournaments.name nama_turnamen, 
                    team_home.id AS team_home_id, 
                    team_home.name AS team_home, 
                    team_away.id AS team_away_id, 
                    team_away.name AS team_away, 
                    tournament_group.name nama_grup
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

$match_log = json_decode($data->match_log) ?? [];

$match_log = array_map(function ($log) use ($db) {
    if ($log->type == "match_event") {
        $log->value->player = $db->single("persons", ['id' => $log->value->player_id]);
    }
    return $log;
}, $match_log);

$home_players = $db->all("team_persons", [
    'team_id' => $data->team_home_id
]);

$home_players = array_map(function ($player) use ($db) {
    $player->person = $db->single('persons', ['id' => $player->person_id]);
    return $player;
}, $home_players);

$away_players = $db->all("team_persons", [
    'team_id' => $data->team_away_id
]);

$away_players = array_map(function ($player) use ($db) {
    $player->person = $db->single('persons', ['id' => $player->person_id]);
    return $player;
}, $away_players);

$db->query = ("SELECT * FROM teams");
$teams = $db->exec("all");

$recent_match_time_log = array_values(array_filter($match_log, function ($log) {
    if ($log->type == 'match_time') {
        return $log;
    }
}));

if (request() == 'POST') {

    if (isset($_POST['match_event'])) {

        $dt = $db->single("tournament_matches", [
            'id' => $_GET['id']
        ]);

        $recent = json_decode($dt->match_log) ?? [];
        array_unshift($recent, ['time' => date("Y-m-d H:i:s"), 'type' => 'match_event', 'value' => $_POST]); //type = match_time, match_event

        $update = $db->update("tournament_matches", [
            'match_log' => json_encode($recent),
            'score_home' => $_POST['match_event'] == "home" && $_POST['status'] == "Goal" ? $dt->score_home + 1 : $dt->score_home,
            'score_away' => $_POST['match_event'] == "away" && $_POST['status'] == "Goal" ? $dt->score_away + 1 : $dt->score_away,
        ], [
            'id' => $_GET['id']
        ]);
    }

    if (isset($_POST['match_time'])) {
        $dt = $db->single("tournament_matches", [
            'id' => $_GET['id']
        ]);


        $recent = json_decode($dt->match_log) ?? [];

        $match_status = "";

        switch ($_POST['match_time']) {
            case "start":
                $match_status = "Sedang Berlangsung";
                $_POST['label'] = $_POST['status'] . " " . ($_POST['match_time'] == 'start' ? "Mulai" : "Selesai \nSkor $dt->score_home:$dt->score_away");
                break;
            case "stop":
                $match_status = "Selesai";
                $_POST['status'] = $recent_match_time_log[0]->value->status;
                $_POST['label'] = $_POST['status'] . " " . ($_POST['match_time'] == 'start' ? "Mulai" : "Selesai \nSkor $dt->score_home:$dt->score_away");
                break;
            case "finish":
                $_POST['status'] = "";
                $match_status = "Pertandingan Selesai";
                $_POST['label'] = "Pertandingan Selesai \nSkor $dt->score_home:$dt->score_away";
                break;
        }

        array_unshift($recent, ['time' => date("Y-m-d H:i:s"), 'type' => 'match_time', 'value' => $_POST]); //type = match_time, match_event

        $update = $db->update("tournament_matches", [
            'match_log' => json_encode($recent),
            'match_status' => $match_status
        ], [
            'id' => $_GET['id']
        ]);
    }

    header('location:' . routeTo('tournament_matches/detail?id=' . $_GET['id']));
}


return compact('data', 'persons', 'teams', 'home_players', 'away_players', 'match_log', 'recent_match_time_log');
