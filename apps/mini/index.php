<?php
//全局定义文件

require '../../define.inc.php';

//载入ThinkSNS模式定义文件

define('APP_NAME'	, 'mini');
define('APP_PATH'	, SITE_PATH.'/apps/'.APP_NAME);
define('APP_URL'	, SITE_URL.'/apps/'.APP_NAME);
define('APP_ROOT'	, SITE_URL.'/apps/'.APP_NAME);
//载入核心文件
require(THINK_PATH."/ThinkSNS.php");

//实例化一个网站应用实例
$App = new App();
$App->run();
?>