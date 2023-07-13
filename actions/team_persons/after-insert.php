<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
header('location:'.routeTo('crud/index',['table'=>$table, 'tournament_id' => $insert->tournament_id, 'team_id' => $insert->team_id]));
die();