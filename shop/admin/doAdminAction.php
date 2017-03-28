<?php 
require_once './doAdmin.php';

$res = $_REQUEST['act'];
if($res == 'logout'){
	logout();
}