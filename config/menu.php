<?php

return [
    'dashboard'                 => 'default/index',
    'turnamen'               => 'crud/index?table=tournaments',
    'tim'                     => 'crud/index?table=teams',
    'grup'          => 'crud/index?table=tournament_group',
    'pertandingan'        => 'crud/index?table=tournament_matches',
    // 'tournament_group_team'     => 'crud/index?table=tournament_group_team',
    // 'team_tournaments'          => 'crud/index?table=team_tournaments',
    // 'persons'                   => 'crud/index?table=persons',
    // 'team_persons'              => 'crud/index?table=team_persons',
    // 'tournament_match_persons'  => 'crud/index?table=tournament_match_persons',
    'pengguna'                  => [
        'semua pengguna' => 'users/index',
        'roles' => 'roles/index'
    ],
    'pengaturan' => 'application/index'
];