<?php

return array(
    'driver' => 'smtp',
    'host' => 'a2plcpnl0363.prod.iad2.secureserver.net',
    'port' => 465,
    'from' => array(
        'address' => ' mail@honeybeetech.com.au',
        'name' => 'HoneyBeeTech',
    ),
    'encryption' =>'ssl',
    'username' => '_mainaccount@honeybeetech.com.au',
    'password' => '=%;Zmy4~|!u',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'timeout' => null,
    'auth_mode' => null,
    'pretend' => false
);