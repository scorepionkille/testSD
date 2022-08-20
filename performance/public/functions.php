<?php

    define('SERVER','127.0.0.1');
    define('USER','sapb_storeitem');
    define('PASS','S@pb.1t99');
    define('NAME','sapb_data');


    class sapb{
        function __construct(){
            $conn = mysqli_connect(SERVER , USER, PASS , NAME);
          	//mysqli_query($conn, "SET NAMES UTF8");
            mysqli_set_charset($conn, "utf8");
            $this->sapbcon = $conn;
            if(mysqli_connect_errno()){
                echo mysqli_connect_error();
            }
        }


        public function insert($item_name , $item_model , $item_number_pd){
            $result = mysqli_query($this->sapbcon , "INSERT INTO storeitem(item_name , item_model , item_number_pd)
            VALUES('$item_name','$item_model','$item_number_pd')");
            return $result;
        }

        public function fetchdata(){
            $result = mysqli_query($this->sapbcon , "SELECT * FROM storeitem");
            return $result;
        }

        public function delete($id_item){
            $result = mysqli_query($this->sapbcon , "DELETE FROM storeitem WHERE id_item = $id_item");
            return $result;
        }

        public function item_bala($item_used , $item_balance){
            $result = mysqli_query($this->sapbcon , "UPDATE storeitem SET item_balance = '$item_balance' WHERE id_item = '$id_item'");
            return $result; 
        }

       public function update($id_item , $item_used){
            $get_item_detail = mysqli_query($this->sapbcon , "SELECT * FROM storeitem WHERE id_item = $id_item limit 1")->fetch_assoc();
            $item_balance = $get_item_detail['item_number_pd'] - $item_used;
            $result = mysqli_query($this->sapbcon , "UPDATE storeitem SET item_used = '$item_used', item_balance = '$item_balance' WHERE id_item = '$id_item'");
            return $result;
       }

    }
    

?>