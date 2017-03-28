<?php 
function getChars($type=1, $length=4){
	if($type ==1){
		$chars = join("", range(0, 9));
	} else if ($type ==2){
		$chars = "".range("a", "z").rang('A', "Z");
	} else if($type == 3){
		$chars = "".range('a', 'z').rang('A', 'Z').rang(0,9);
	}
	$chars = str_shuffle($chars);
	return substr($chars, 0, $length);
}