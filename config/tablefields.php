<?php

return [
    'tblname'    => [
        'field1','field2'
    ],
    'teams' => [
        'name' => [
            'label' => 'Nama',
            'type'  => 'text'
        ],
        'address' => [
            'label' => 'Alamat',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No.Hp',
            'type' => 'text'
        ],
        'logo' => [
            'label' => 'Logo Teams',
            'type' => 'file'
        ]
    ],
    'tournaments' => [
        'name' => [
            'label' => 'Nama Turnamen',
            'type' => 'text'
        ],
        'description' => [
            'label' => 'Deskripsi Turnamen',
            'type'  => 'text'
        ]
    ],
    'persons' => [
        'id_card_number' => [
            'label' => 'NIK',
            'type'  => 'text'
        ],
        'name' => [
            'label' => 'Nama Lengkap',
            'type'  => 'text'
        ], 
        'gender' => [
            'label' => 'Jenis Kelamin',
            'type'  => 'options:Pilih Jenis Kelamin|Laki-laki|Perempuan'
        ],
        'birthdate' => [
            'label' => 'Tanggal Lahir',
            'type'  => 'date'
        ],
        'address' => [
            'label' => 'Alamat',
            'type'  => 'text'
        ],
        'phone' => [
            'label' => 'No Hp',
            'type'  => 'text'
        ],
        'pic_url' => [
            'label' => 'Pas Foto',
            'type'  => 'file'
        ],
        'id_card_pic' => [
            'label' => 'Foto KTP',
            'type'  => 'file'
        ],

    ],
    'tournament_group' => [
        'tournament_id' => [
            'label' => 'Nama Turnamen',
            'type' => 'options-obj:tournaments,id,name'
        ],
        'name' => [
            'label' => 'Nama Grup',
            'type'  => 'text'
        ]
    ],
    'tournament_group_team' => [
        'group_id' => [
            'label' => 'Nama Grub',
            'type' => 'options-obj:tournament_group,id,name'
        ],
        'team_id' => [
            'label' => 'Nama Team',
            'type'  => 'options-obj:teams,id,name'
        ],
        'point' => [
            'label' => 'Point',
            'type'  => 'text'
        ]
    ],
    'team_tournaments' => [
        'team_id' => [
            'label' => 'Nama Team',
            'type'  => 'options-obj:teams,id,name'
        ],
        'tournament_id' => [
            'label' => 'Nama Turnamen',
            'type' => 'options-obj:tournaments,id,name'
        ],
        'status' => [
            'label' => 'Status',
            'type'  => 'options:Verified|Not Verified'
        ]
    ],
    'team_persons' => [
        'team_id' => [
            'label' => 'Nama Team',
            'type'  => 'options-obj:teams,id,name'
        ],
        'person_id' => [
            'label' => 'Nama Orang',
            'type' => 'options-obj:persons,id,name'
        ],
        'tournament_id' => [
            'label' => 'Nama Turnamen',
            'type' => 'options-obj:tournaments,id,name'
        ],
        'pic_url' => [
            'label' => 'Pas Foto',
            'type'  => 'file'
        ],
        'position' => [
            'label' => 'Posisi Sebagai',
            'type'  => 'options:Pilih Posisi|Coach|Manager|Official|GK|DEF|MID|ATTACK'
        ],
        'status' => [
            'label' => 'Status',
            'type'  => 'options:Verified|Not Verified'
        ]
    ],
    'tournament_matches' => [
        'tournament_id' => [
            'label' => 'Nama Turnamen',
            'type' => 'options-obj:tournaments,id,name'
        ],
        'group_id' => [
            'label' => 'Nama Grub',
            'type' => 'options-obj:tournament_group,id,name'
        ],
        'team_home_id' => [
            'label' => 'Team Tuan Rumah',
            'type'  => 'options-obj:teams,id,name'
        ],
        'team_away_id' => [
            'label' => 'Team Tamu',
            'type'  => 'options-obj:teams,id,name'
        ],
        'score_home' => [
            'label' => 'Score Home',
            'type'  => 'text'
        ],
        'score_away' => [
            'label' => 'Score Away',
            'type'  => 'text'
        ],
        'match_status' => [
            'label' => 'Status Pertandingan',
            'type'  => 'options:HT|FT|ET|AET'
        ],
        'schedule_at' => [
            'label' => 'Jadwal',
            'type'  => 'date'
        ],
        'description' => [
            'label' => 'Deskripsi',
            'type'  => 'text'
        ],
        'match_log' => [
            'label' => 'Pertandingan',
            'type'  => 'JSON'
        ],
        'venue' => [
            'label' => 'Lokasi',
            'type'  => 'text'
        ],
    ],
    'tournament_match_persons' => [
        'match_id' => [
            'label' => 'Match',
            'type'  => 'options-obj:tournament_matches,id,description'
        ],
        'team_id' => [
            'label' => 'Nama Team',
            'type'  => 'options-obj:teams,id,name'
        ],
        'person_id' => [
            'label' => 'Nama Orang',
            'type' => 'options-obj:persons,id,name'
        ],
        'position' => [
            'label' => 'Posisi',
            'type'  => 'text'
        ],
        'number' => [
            'label' => 'Nomor',
            'type'  => 'text'
        ],
        'is_starting' => [
            'label' => 'Start',
            'type'  => 'text'
        ],
        'play_at' => [
            'label' => 'Play',
            'type'  => 'text'
        ],
        'stop_at' => [
            'label' => 'Stop',
            'type'  => 'text'
        ],
        'reason' => [
            'label' => 'Alasan',
            'type'  => 'text'
        ],
    ],
];