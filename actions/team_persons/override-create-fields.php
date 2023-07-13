<?php

$fields = array_merge($fields, [
    'id_card_number' => [
        'label' => 'NIK',
        'type'  => 'text'
    ],
    'name' => [
        'label' => 'Nama',
        'type'  => 'text'
    ],
    'gender' => [
        'label' => 'Jenis Kelamin',
        'type'  => 'options:Laki-laki|Perempuan'
    ],
    'birthdate' => [
        'label' => 'Tanggal Lahir',
        'type'  => 'date'
    ],
]);

unset($fields['person_id']);

return $fields;