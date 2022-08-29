<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_login extends CI_Model {

    public function __construct(){
        parent::__construct();        
    }

    public function getUserInfo($x,$y){
        // $rs = $this->db->query("SELECT * FROM admin_user WHERE admin_user_username='$x' and admin_user_password=password('$y')");
        $rs = $this->db->query("SELECT * FROM admin_user WHERE admin_user_username= '$x' and admin_user_password = password('$y') and (`admin_user_security` = 1 OR `admin_user_security` = 8 OR `admin_user_security` = 15)");

        if($rs->num_rows() > 0){
            return $rs->result();
        }else{
            return false;
        }
    }
}
