<?php

return [
    'dashboard'                 => 'default/index',
    'teams'                     => 'teams/index',
    'tournaments'               => 'crud/index?table=tournaments',
    'tournament_group'          => 'crud/index?table=tournament_group',
    'tournament_group_team'     => 'crud/index?table=tournament_group_team',
    'team_tournaments'          => 'crud/index?table=team_tournaments',
    // 'persons'                   => 'crud/index?table=persons',
    'team_persons'              => 'crud/index?table=team_persons',
    'tournament_matches'        => 'crud/index?table=tournament_matches',
    'tournament_match_persons'  => 'crud/index?table=tournament_match_persons',
    'pengguna'                  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];