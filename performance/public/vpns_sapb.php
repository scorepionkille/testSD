<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reversible Lane status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
      <div class="row align-items-center mt-3">
        <div>
          <h3 class="text-center">สถานะป้ายจราจร Reversible Lane</h3>
        </div>
            <table class="table">
                <?php
                include_once('cons.php');
                $res = new sapb();
                $sql_all = $res->showdata();
                $row  = $sql_all->fetch_all(MYSQLI_ASSOC);
                $time_one = strtotime(date('Y-m-d H:i:s')) - 300;
                $time_re_check_one = strtotime($row[0]['date_time']);
                if($time_one > $time_re_check_one){
                  $status_one =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_one =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_two = strtotime($row[1]['date_time']);
                if($time_one > $time_re_check_two){
                  $status_two =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_two =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_three = strtotime($row[2]['date_time']);
                if($time_one > $time_re_check_three){
                  $status_three =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_three =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_four = strtotime($row[3]['date_time']);
                if($time_one > $time_re_check_four){
                  $status_four =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_four =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_five = strtotime($row[4]['date_time']);
                if($time_one > $time_re_check_five){
                  $status_five =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_five =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_six = strtotime($row[5]['date_time']);
                if($time_one > $time_re_check_six){
                  $status_six =  '<b style="color:red;">Offline</b>';
                }else{
                  $status_six =  '<b style="color:green;">Online</b>';
                }
                
                $time_re_check_seven = strtotime($row[6]['date_time']);
                if($time_one > $time_re_check_seven){
                    $status_seven =  '<b style="color:red;">Offline</b>';
                }else{
                    $status_seven =  '<b style="color:green;">Online</b>';
                }
                
                // echo '<pre>'; print_r($row);
                // echo date('Y-m-d H:i:s');
                

                    
                // foreach($sql_all->fetch_all(MYSQLI_ASSOC as $row){;
                //echo $sql_all['id_name_vpn'];
                // echo gettype($sql_all).'<br>';
                //echo '<pre>'; print_r($sql_all->fetch_all(MYSQLI_ASSOC));
                // echo print_r($row).'<br>';
                // echo $row[0]['id_name_vpn'].'<br>';
                // echo $row[1]['id_name_vpn'];
                // echo $row[0]['id'];
                ?>

                <thead>
                  <tr>
                    <th scope="col">Number</th>
                    <th scope="col">Location</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>กม.6+000A</td>
                    <td><?php echo $status_one;?></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>กม.6+800A</td>
                    <td><?php echo $status_two;?></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>กม.8+300A</td>
                    <td><?php echo $status_three;?></td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>กม.9+000A</td>
                    <td><?php echo $status_four;?></td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>กม.10+000A</td>
                    <td><?php echo $status_five;?></td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>กม.11+300A</td>
                    <td><?php echo $status_six;?></td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>กม.7+000B</td>
                    <td><?php echo $status_seven;?></td>
                  </tr>
                </tbody>
              </table>
        </div>
      </div>




      <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    </body>
</html>
<?php
  



  // while ($row = mysqli_fetch_array($sql_all)) {
  //   $summ = mysqli_fetch_object($row)

  //   echo gettype($row['id_name_vpn']).'<br>';
  // }
  

  //  while ($sql_all->) {
  //    $time_re_check = strtotime($row['date_time']);
  //    $time_crrent = strtotime(date('Y-m_d H:i:s')) - 300;
  //  }
  
    
    
  //}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reversible Lane</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-6">

            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
<!doctype html>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(function(){
	 	setTimeout(function(){
  		 location.reload();
 		 }, 10000);
	});
</script>

<?php exit; ?>

</html>