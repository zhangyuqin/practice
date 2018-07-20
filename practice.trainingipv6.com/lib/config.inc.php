<?php
define('DOMAINTYPE','off');
define('CH','exam_');
define('CDO','');
define('CP','/');
define('CRT',180);
define('CS','xn9dylsl012002');
define('HE','utf-8');
define('PN',10);
define('TIME',time());
if(dirname($_SERVER['SCRIPT_NAME']))
define('WP','http://'.$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']).'/');
else
define('WP','http://'.$_SERVER['SERVER_NAME']);
define('ROOT',$_SERVER['DOCUMENT_ROOT']);
define('DB','phpems');//MYSQL数据库名
define('DH','localhost');//MYSQL主机名，不用改
define('DU','root');//MYSQL数据库用户名
define('DP','sjgj2508');//MYSQL数据库用户密码
define('DTH','x2_');//系统表前缀，不用改

//Email configure
define('SMTP_HOST','smtp.exmail.qq.com');//SMTP服务
define('SMTP_PORT','465');//SMTP服务器端
define('SMTP_USER','cksong@biigroup.cn');//SMTP服务器用户名
define('SMTP_PASS','sjgj2508');//SMTP服务器密
define('FROM_EMAIL','educaiton@ipv6ready.org.cn');//发件人EMAIL
define('FROM_NAME','ipv6certification');//发件人名
define('REPLY_EMAIL','');//回复EMAIL（留空则为发件人EMAIL)
define('REPLY_NAME','');//回复名称（留空则为发件人名称）
define('CC','service@ipv6ready.org.cn');//抄送

?>
