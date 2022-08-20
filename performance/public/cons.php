<?php
    define('SERVER','127.0.0.1');
    define('USER','sapb_logvpn');
    define('PASS','S@pb.1t99');
    define('NAME','sapb_logvpn');

    class sapb{
        function __construct(){
            $con = mysqli_connect(SERVER ,USER ,PASS , NAME);
            $this->sapbcon = $con;
            if(mysqli_connect_errno()){
                echo mysqli_connect_error();
            }
        }

        public function sgan($id_name_vpn){
            $checkuserip = mysqli_query($this->sapbcon , "SELECT id_name_vpn FROM vpns 
            WHERE id_name_vpn = '$id_name_vpn'");
            return $checkuserip;
        }

        public function insert($id_name_vpn){
            $time = date('Y-m-d H:i:s');
            $result = mysqli_query($this->sapbcon , "INSERT INTO vpns(id_name_vpn,date_time)
            VALUES('$id_name_vpn','$time')");
            return $result;
        }

        public function showdata(){
            $result = mysqli_query($this->sapbcon , "SELECT * FROM vpns");
            return $result;
        }

        public function delete($id){
            $result = mysqli_query($this->sapbcon , "DELETE FROM vpns WHERE id = $id");
            return $result;
        }

        public function updatavpn($id_name_vpn){
            $time = date('Y-m-d H:i:s');
            $result = mysqli_query($this->sapbcon , "UPDATE vpns SET date_time = '$time' where id_name_vpn = '$id_name_vpn'");
            return $result;
        }


    }


?>