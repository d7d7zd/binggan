
<?php 


function go($msg, $href) {
	echo "<script>alert('{$msg}')</script>";
	echo "<script>window.location.href='{$href}'</script>";
}
function isAdmin($name, $passwd) {
	$sql = "select * from admin where name='{$name}' and  password='{$passwd}'";
	return fetchOne ( $sql );
}

function checklogin(){
	if(@$_COOKIE['adminId']==null && $_SESSION['id']==null){
		go('请登陆!', 'login.php');
	}
}

function logout(){
	$_SESSION = array();
	if(isset($_COOKIE[session_name()])){
		setcookie(session_name(),'', time()-1);
	}
	setcookie('adminName',null);
	setcookie('adminId', null);
	
	session_destroy();
	go('退出成功', 'login.php');
}