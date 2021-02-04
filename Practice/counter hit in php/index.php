<?php

require ('connect.php');
// $user = $_SERVER['REMOTE_ADDR'];
$user = '::6';
function ip_exists($ip){
	global $user;
	global $conn;
	echo $qry = "select ip from ip_add where ip = '$user'";
	$res = mysqli_query($conn,$qry);
	if(@mysqli_num_rows($res)==0) {
		return  false;
	} else if(mysqli_num_rows($res) == 1){
		return true;
	}
}

function ip_add($ip){
	$qry = "insert into ip_add values('$ip')";
	global $conn;
	mysqli_query($conn,$qry);
}
// ip_add($user);
function update_count(){
	 $qry = "select count from hit_count";
	 global $conn;
	if ($result = mysqli_query($conn , $qry)) {
		if($num = mysqli_num_rows($result) > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				$count = $data['count'];
			}
			$countnow = $count + 1;
			$qry = "update hit_count set count = '$countnow'";
			if (mysqli_query($conn,$qry)) {
			}
		} else {
			echo "No result found.....";
		}
	} else {
		echo mysqli_error($conn);
	}
}
if(!ip_exists($user))
{
	update_count();
	ip_add($user);
}


?>