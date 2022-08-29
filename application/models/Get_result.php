<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Get_result extends CI_Model
{

        public function check_std($stdId)
        {
                // first check into s_result_entry table
                // if exist then redirect to result update page with message 'result already exist'
                $ch_s_result_entry = $this->db->query("SELECT *FROM s_result_entry WHERE s_resultentry_sid = $stdId");

                if ($ch_s_result_entry->num_rows() > 0) {
                        // result exist
                        return 1;
                } else {
                        // find student in student_user table
                        $rs = $this->db->query("SELECT * FROM `student_user` WHERE student_user_sid = $stdId LIMIT 1");

                        if ($rs->num_rows() > 0) {
                                // exist in student table but result table
                                return $rs->result();
                        } else {
                                // no existance nighter student table nor result table
                                return 0;
                        }
                }
        }

        public function search_student_result($x)
        {
                // find student result in db s_result_entry
                $rs = $this->db->query("SELECT * FROM `s_result_entry` WHERE `s_resultentry_sid` = $x");

                if ($rs->num_rows() > 0) {
                        return $rs->result();
                } else {
                        return false;
                }
        }
        public function get_img_path($x)
        {
                // find the image path from student_user table
                $img_path = $this->db->query("SELECT path FROM `student_user` WHERE `student_user_sid` = $x");

                if ($img_path->num_rows() > 0) {
                        $rs = $img_path->result();
                        foreach ($rs as $row) {
                                $img_path_final = $row->path;
                        }
                        // return 2;
                        return $img_path_final;
                } else {
                        return 0;
                }
        }
}
