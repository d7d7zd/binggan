<?php 
require_once '../include.php';
function connect(){
	$link =  mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("连接数据库失败");
	mysql_set_charset(DB_CHARSET);
	mysql_select_db(DB_DBNAME);
	return $link;
}

function insert($table, $array){
	$keys = join(',', array_keys($array));
	$values = "'".join("','", array_values($array))."'";
	$sql = "insert into {$table} ({$keys})values({$values})";
	mysql_query($sql);
	return mysql_insert_id();
}
//这段代码是测试插入是否成功。
// if(connect()){
// 	echo "连接成功";
// 	$array = array('name'=>'xiaowu', 'password'=>'123456');
// 	 insert('admin', $array);
// }

function delete($table, $where=null){
	$where = $where==null? null:'where '.$where;
	$sql = "delete from {$table} ".$where;
	mysql_query($sql);
	return mysql_affected_rows();
}

//测试删除功能
// if(connect()){
// 	echo '连接功成';
// 	$table = 'admin';
// 	$where = "name = 'xiaowu'";
// 	delete($table, $where);
// }


function update($table, $array, $where=null){
	$str = '';
	foreach ($array as $key=>$value){
		if($str == null){
			$step = ' ';
		} else {
			$step = ',';
		}
		$str .= $step.$key."='".$value."' ";
	}
	
	$where = $where==null? null: 'where '.$where;
	$sql = "update {$table} set {$str}".$where;
	echo $sql;
	mysql_query($sql);
	return mysql_affected_rows();
}

// if(connect()){
// 	echo '连接成功';
// 	$array = array('password'=>'5555');
// 	update("admin", $array, "name = 'zhangwei'");
// }


function fetchOne($sql, $result_type=MYSQL_ASSOC){
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result, $result_type);
	return $row;
}

// if(connect()){
// 	$sql = "select * from admin where name='xiaowu'";
// 	print_r(fetchOne($sql));
// }

function fetchAll($sql, $result_type=MYSQL_ASSOC){
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result, $result_type)){
		$rows[] = $row;
	}
	return $rows;
}

// if(connect()){
// 	echo '成功';
// 	$sql = 'select * from admin';
// 	 print_r(fetchAll($sql));
// }

function getNum($sql){
	$result = mysql_query($sql);
	return mysql_num_rows($result);
}
connect();
