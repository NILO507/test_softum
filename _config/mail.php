<?php

return [
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 587,
    'from' => [
        'address' => 'hello@example.com',
        'name' => 'Example',
    ],
    'encryption' => 'tls',
    'username' => 'hello@example.com',
    'password' => '',
    'sendmail' => '/usr/sbin/sendmail -bs',
];
