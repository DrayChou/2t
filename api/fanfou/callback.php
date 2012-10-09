<?php
/*
**这个文件是回调文件。也就是认证返回token的地方
**得到token之后你就可以访问任何数据了
*/

$config = require(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "config2.php");
require_once(dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR . "common.php");
require_once('oauth.php');
require_once('client.php');

session_start();

//建造一个新的认证对象

$o = new OAuth( $config["api"]["fanfou"]["consumer_key"] , $config["api"]["fanfou"]["consumer_secret"] , $_SESSION['temp']['oauth_token'] , $_SESSION['temp']['oauth_token_secret']  );

$last_key = $o -> getAccessToken(  $_SESSION['temp']['oauth_token'] ) ;

$_SESSION['last_key'] = $last_key;

echo  '获得的token：'.$last_key['oauth_token'];

echo '<br>';

echo '获得的token_secret：'.$last_key['oauth_token_secret'];

echo '<br>以后你就可以拿着上面的两个家伙访问饭否了。下面是你的消息列表，直接都是json数据,小心眼花哦<br>';


//创造一个新的请求

$ff_user = new Client( $config["api"]["fanfou"]["consumer_key"] , $config["api"]["fanfou"]["consumer_secret"] , $last_key['oauth_token'] , $last_key['oauth_token_secret']  );
$userinfo = $ff_user -> verify_credentials();
$userinfo = json_decode($userinfo);
if(is_object($userinfo)){
    $userinfo = objectsIntoArray($userinfo);
}

var_dump($userinfo);
$last_key["user_id"] = $userinfo["id"];
$last_key["screen_name"] = $userinfo["screen_name"];
set_config("fanfou", $userinfo["screen_name"], $last_key, $config["data_directory"]);

// echo $ff_user -> update("测试用API发饭否");

?>
