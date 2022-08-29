<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Set_result extends CI_Model
{

    public function insertResult($std_result)
    {
        $rs = $this->db->insert('s_result_entry', $std_result);

        if ($rs) {
            return $rs;
        } else {
            return 0;
        }
    }
    public function insertStudentData($result)
    {
        $rs = $this->db->insert('student_user', $result);

        if ($rs) {
            return $rs;
        } else {
            return 0;
        }
    }
    public function updateResult($result){
        $sid =  $result['s_resultentry_sid'];

        $this->db->where('s_resultentry_sid', $sid);
        $rs = $this->db->update('s_result_entry', $result);

        if ($rs) {
            return $rs;
        } else {
            return 0;
        }
    }
}
