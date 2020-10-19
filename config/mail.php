<?php

return array(
    'driver' => 'smtp',
    'host' => 'smtp.office365.com',
    'port' => 587,
    'from' => array(
        'address' => 'mail@honeybeetech.com.au',
        'name' => 'HoneyBeeTech',
    ),
    'encryption' =>'tls',
    'username' => 'admin@honeybeetech.com.au',
    'password' => 'Honeybee01',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'timeout' => null,
    'auth_mode' => null,
    'pretend' => false
);