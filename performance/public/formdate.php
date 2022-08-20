<?php

    include_once('functions.php');
    $insertdata = new sapb();
    if(isset($_POST['insert'])){
        $item_name = $_POST['nameproduct'];
        $item_model = $_POST['modelitem'];
        $item_number_pd = $_POST['numberpd'];

        $sql = $insertdata->insert($item_name , $item_model , $item_number_pd);
        if($sql){
            echo "<script>window.location.href='showdate.php'</script>";
        }else{
            echo "มีข้อผิดพลาด".mysqli_connect_error($sql);
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>fromdata</title>
</head>
<body>
    <div class="container">
        <div class="position-absolute top-50 start-50 translate-middle">
            <h4>FROM STORE SAPB</h4>
            <div>
                <form action="" method="POST">
                    <label for="">ชื่อสินค้า</label>
                    <input type="text" name="nameproduct" >
                    <br>
                    <label for="">รุ่นสินค้า</label>
                    <input type="text" name="modelitem">
                    <br>
                    <label for="">จำนวนนำเข้า</label>
                    <input type="text" name="numberpd">
                    <br>
                    <input class="btn btn-primary" type="submit" name="insert" value="บันทึก">
                </form>
            </div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>