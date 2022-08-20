 <?php
	//header('Access-Control-Allow-Origin: *');
	include_once('cons.php');
	$id_name_vpn1 = (isset($_POST['id_name_vpn']) ? $_POST['id_name_vpn'] : 'NON');
	$res = new sapb();
  
	if($id_name_vpn1 != 'NON'){
	  $sql = $res->sgan($id_name_vpn1);
	  if(mysqli_num_rows($sql) > 0){
		$res->updatavpn($id_name_vpn1);
	  }else{
		$res->insert($id_name_vpn1);
	  }
	}
?>