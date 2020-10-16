<?php

return array(
    'driver' => 'smtp',
    'host' => 'smtp.gmail.com',
    'port' => 465,
    'from' => array(
        'address' => 'mail@honeybeetech.com.au',
        'name' => 'HoneyBeeTech',
    ),
    'encryption' =>'ssl',
    'username' => 'honeybeerecruiting@gmail.com',
    'password' => 'gixtnzxiygjzqpoi',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'timeout' => null,
    'auth_mode' => null,
    'pretend' => false
);