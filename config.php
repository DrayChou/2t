<?php

return array(
    'base_url' => 'http://127.0.0.1/2t/',
    'data_directory' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'include' . DIRECTORY_SEPARATOR,
    'db' => array(
        'database' => 'mysql:host=hostname;dbname=o2t',
        'username' => 'o2t',
        'password' => 'KMKDX69K3zBYMjbs'
    ),
    'api' => array(
        'twitter' => array(
            'oauth' => "1",
            'consumer_key' => 'fooraP637t5D7laC9CI4g',
            'consumer_secret' => 'tne4rqfjigm0gHwdAvjlIeu5xKuElCMerrF3smF04Z4',
            'oauth_callback' => 'https://t.zh-w.co.cc/twitter_oauth.php',
        ),
        'fanfou' => array(
            'oauth' => "1",
            'consumer_key' => 'a3542568412fbad6b84b5b74f89541c8',
            'consumer_secret' => 'ad84cfc0f054262c26c78483e3a7879b',
            'oauth_callback' => 'http://127.0.0.1/2t/api/fanfou/callback.php',
        ),
        'douban' => array(
            'oauth' => "1",
            'consumer_key' => '0894afcd359c250419be0f67a0d46f0c',
            'consumer_secret' => 'eef0a82f34d98253',
            'oauth_callback' => 'http://127.0.0.1/2t/api/douban/callback.php',
        ),
        'facebook' => array(
            'oauth' => "2",
            'appId' => '184407408351432',
            'secret' => '40c6d5f22f12c5802af6f3a61ac20e15',
            'cookie' => true
        )
    )
);