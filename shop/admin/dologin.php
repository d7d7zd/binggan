<?php
require_once '../lib/mysql.func.php';
require_once './doAdmin.php';

// 通过post得到用户名 密码 验证码
$userName = $_POST ['name'];
$password = $_POST ['passwd'];
$verify = $_POST ['verify'];
$autoLogin = $_POST['autoLogin'];

// 调用session
session_start ();
$verify_sess = $_SESSION ['verify'];

// 判断
if ($verify == $verify_sess) {
	
	$row = isAdmin ( $userName, $password );
	if ($row) {
		if($autoLogin){
			setcookie('adminId', $row['id'], time()+7*24*3600);
			setcookie('adminName', $row['name'], time()+7*24*3600);
		}
		
		$_SESSION ['adminName'] = $userName;
		$_SESSION ['id'] = $row ['id'];
		go("欢迎回来！亲爱的  {$userName}", 'index.php');
	} else {
		go ( '账号或密码不正确', 'login.php' );
	}
} else {
	go ( '验证码错误', 'login.php' );
}
