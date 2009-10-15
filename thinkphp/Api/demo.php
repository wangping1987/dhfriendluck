<?php
header("Content-type: text/html;charset=utf-8");
define("THINK_PATH","..");

error_reporting(0);

session_start();
$_SESSION["mid"] = 1;


require "TS_API.class.php";

//调试demo 
$api = new TS_API();

//ts_dump($api);


/* ===========================================================================================
 * ========================================= USER ============================================
 * ===========================================================================================
 */

/*-------------------------------------
= user_getInfo
-------------------------------------*/
$user_info  = $api->user_getInfo("1,2","name,email");
$user_info2 = $api->user_getInfo("1,2","name,email","json");
ts_dump($user_info);
ts_dump($user_info2);

/*-------------------------------------
= user_getLoggedInUser
-------------------------------------*/
$user_id  = $api->user_getLoggedInUser();
ts_dump($user_id);

/*-------------------------------------
= user_getLoggedInUserLevel
-------------------------------------*/
$admin_level  = $api->user_getLoggedInUserLevel();
ts_dump($admin_level);

/*-------------------------------------
= user_isAppAdded
-------------------------------------*/
$isAppAdded  = $api->user_isAppAdded();
ts_dump($isAppAdded);

/*-------------------------------------
= user_getLinkName
-------------------------------------*/
$r = $api->user_getLinkName(1);
ts_dump($r);


/* ===========================================================================================
 * ========================================= FRIEND ==========================================
 * ===========================================================================================
 */


/*-------------------------------------
=  friend_get()
-------------------------------------*/
$fris = $api->friend_get();
ts_dump($fris);

/*-------------------------------------
= friend_areFriends
-------------------------------------*/
$r = $api->friend_areFriends(1,2);
ts_dump($r);

/*-------------------------------------
= friend_getAppUsers -- 待完成
-------------------------------------*/
$r = $api->friend_getAppUsers();
ts_dump($r);


/* ===========================================================================================
 * ========================================= SITE ============================================
 * ===========================================================================================
 */

/*-------------------------------------
=  site_get()
-------------------------------------*/
$r = $api->site_get();
ts_dump($r);

/* ===========================================================================================
 * ========================================= FEED ============================================
 * ===========================================================================================
 */

/*-------------------------------------
=  feed_publish()
-------------------------------------*/

//$title_data["touser"] = $api->user_getLinkName(2);

//$r = $api->feed_publish("friend",$title_data);

//$title_data["car"] = "宝马";
//$title_data["xxx"] = "MM";
$body_data['pic'] = '<img src="http://www.qiniao.com/wiki/style/default/logo.gif">';

$r = $api->feed_publish("share",$title_data,$body_data);

ts_dump($r);

echo "<hr>";
/*-------------------------------------
=  feed_get($who,$type,$num,$format)
-------------------------------------*/
$r1 = $api->feed_get("fri","all",10);
$r2 = $api->feed_get("my","all",3);
ts_dump($r1);
ts_dump($r2);


/* ===========================================================================================
 * ========================================= NOTIFY ==========================================
 * ===========================================================================================
 */

/*-------------------------------------
= notify_send($uids,$type,$title,$info,$cate)
-------------------------------------*/
define("__APP__","/TEST/TP1_6/Test/index.php");
$uid = "111,222";
$type = "mini_comment";

$title_data2["xxx"] = "aaa";

$body_data2["comment"] = "PLMM!";
$body_data2["url"] = __APP__."/Photo/list/id/2";

//$r = $api->notify_send($uid,$type,$title_data2,$body_data2);
ts_dump($r);



/*-------------------------------------
= notify_get($cate,$type);
-------------------------------------*/
$r = $api->notify_get("notification");
ts_dump($r);


/*-------------------------------------
= notify_getNewNum($cate);
-------------------------------------*/
$r = $api->notify_getNewNum(null,"json");
ts_dump($r);

/*-------------------------------------
= App
-------------------------------------*/
$r = $api->app_getLeftNav();
ts_dump($r);


?>