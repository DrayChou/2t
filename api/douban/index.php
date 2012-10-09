<?php
$config = include(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "config2.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "common.php");
require_once('oauth.php');
require_once('client.php');

$douban = get_config("douban","We_Get",$config["data_directory"]);

if(empty($douban)){
    $o = new OAuth( $config["api"]["douban"]["consumer_key"] , $config["api"]["douban"]["consumer_secret"]  );

    $keys = $o -> getRequestToken();

    $aurl = $o -> getAuthorizeURL( $keys['oauth_token'] ,false , $config["api"]["douban"]["oauth_callback"]);

    session_start();
        
    $_SESSION['temp'] = $keys;

    echo "<a href=\"$aurl\" >点击授权</a>";
}
else{
    session_start();
    $ff_user = new Client( $config["api"]["douban"]["consumer_key"] , $config["api"]["douban"]["consumer_secret"] , $douban['oauth_token'] , $douban['oauth_token_secret']  );
    $userinfo = $ff_user -> verify_credentials();
    $userinfo = json_decode($userinfo);
    if(is_object($userinfo)){
        $userinfo = objectsIntoArray($userinfo);
    }
    var_dump($userinfo);
}
?>