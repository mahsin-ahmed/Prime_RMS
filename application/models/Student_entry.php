<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student_entry extends CI_Model
{
    public function insertStudentData($data)
    {
        $rs = $this->db->insert('student_user', $data);

        if ($rs) {
            return $rs;
        } else {
            return 0;
        }
    }

    public function getStudetnt(){
        $sql = "SELECT * FROM `student_user` ORDER by `student_user_id` DESC LIMIT 1";
        $rs = $this->db->query($sql);

        if ($rs->num_rows() > 0) {
            return $rs->result();
    }
    }
}
