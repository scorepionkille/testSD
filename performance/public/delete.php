<?php
    include_once('functions.php');
    if(isset($_GET['del'])){
        $id_item = $_GET['del'];
        $delete = new sapb();
        $sql = $delete->delete($id_item);
        if($sql){
            echo "<script>window.location.href='showdate.php'</script>";
        }else{
            echo mysqli_connect_error($sql);
        }    
    }

?>