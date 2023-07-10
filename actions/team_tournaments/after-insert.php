<?php

set_flash_msg(['success'=>_ucwords(__($table)).' berhasil ditambahkan']);
header('location:'.routeTo('crud/index',['table'=>$table, 'id' => $insert->tournament_id]));
die();