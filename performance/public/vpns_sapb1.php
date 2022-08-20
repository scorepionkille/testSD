<!doctype html>

<?php
  // header('Access-Control-Allow-Origin: *');
  // include_once('cons.php');
  // $id_name_vpn1 = (isset($_POST['id_name_vpn']) ? $_POST['id_name_vpn'] : 'NON');
  // $res = new sapb();

  // if($id_name_vpn1 != 'NON'){
  //   $sql = $res->sgan($id_name_vpn1);
  //   if(mysqli_num_rows($sql) > 0){
  //     $res->updatavpn($id_name_vpn1);
  //   }else{
  //     $res->insert($id_name_vpn1);
  //   }
  // }
  include_once('cons.php');
  $res = new sapb();
  $sql_all = $res->showdata();
  //echo '<pre>'; print_r($sql_all->fetch_all(MYSQLI_ASSOC));
  echo '<B>'."สถานะป้ายจราจร Reversible Lane".'<br>'.'<br>';
  // echo date('Y-m-d H:i:s').'<br>';
  foreach($sql_all->fetch_all(MYSQLI_ASSOC) as $row){
    //echo $row['id_name_vpn'].' / '.$row['date_time'].'<br>';

    $time_re_check = strtotime($row['date_time']);
    $time_current = strtotime(date('Y-m-d H:i:s')) - 300;
    
    if($time_current > $time_re_check){
      $status = '<b style="color:red;">Offline</b>';
    }else{
       $status = '<b style = "color:green;">Online</b>'; //<font color = \"green\">Online</font>
    }
    echo $row['id_name_vpn'].'  '."Status".' : '.$status.'<br>'.'<br>';
	//$row['date_time']
  }
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(function(){
	 	setTimeout(function(){
  		 location.reload();
 		 }, 30000);
	});
</script>

<?php exit; ?>
