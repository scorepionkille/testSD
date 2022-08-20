<?php
    include_once('functions.php');
    $updateuser = new sapb();
    if(isset($_POST['numberitem'])){
        $id_item = $_GET['updata'];
        $item_used = $_POST['ib'];

        $sql = $updateuser->update($id_item,$item_used);
        if($sql){
            echo "<script>window.location.href='showdate.php'</script>";
        }else{
            echo mysqli_connect_error($sql);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัพเดทข้อมูลสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
</head>
<body>
    
    <div class="input-group mb-3">
        <form method="POST">
          <input type="text" class="form-control" placeholder="ระบุจำนวน" aria-label="Recipient's username" aria-describedby="button-addon2" name="ib">
          <input class="btn btn-primary" type="submit" name="numberitem" value="Apply">    
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>